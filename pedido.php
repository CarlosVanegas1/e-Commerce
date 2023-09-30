<?php require_once "config/conexion.php";
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1R6S1G31EQ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-1R6S1G31EQ');
    </script>
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Confirmacion de pedido</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
 
 </head>
 <body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">CONFIRMANDO TU PEDIDO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">COSMIC COFFEE</h1>
                <p class="lead fw-normal text-white-50 mb-0">Recuerde diligenciar correctamente sus datos</p>
            </div>
        </div>
    </header>

    <section class="py-1">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <form action="confirmar.php" method="post"/>
                    <div class="card-body p-2">
                        <div class="text-center">
                            <p><h7 class="fw-bolder">NOMBRE Y APELLIDO:</h7></p>
                            <p><input type="text" name="nombre" size="32"/></p>
                            <p><h7 class="fw-bolder">CELULAR:</h7></p>
                            <p><input type="text" name="celular" size="32"/></p>
                            <p><h7 class="fw-bolder">DESCRIBA SU UBICACIÓN:</h7></p>
                            <p><textarea name="ubicacion" rows="3" cols="35"></textarea></p>
                        </div>
                    </div>
                    <section class="py-5">
                        <div class="container px-4 px-lg-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tblCarrito">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-5 ms-auto">
                                <span id='json' name="pedido"></span>
                                    <h4>Total a Pagar: <span id="total_pagar">0</span></h4>
                                    <div class="d-grid gap-2">
                                        <div id="paypal-button-container"></div>
                                        <button class="btn btn-success" type="submit" id="btnConfirmar">Confirmar Pedido</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Cosmic Coffee 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        mostrarCarrito();

        function mostrarCarrito() {
            if (localStorage.getItem("productos") != null) {
                let array = JSON.parse(localStorage.getItem('productos'));
                if (array.length > 0) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        async: true,
                        data: {
                            action: 'buscar',
                            data: array
                        },
                        success: function(response) {
                            console.log(response);
                            const res = JSON.parse(response);
                            let html = '';
                            let resp = '';
                            res.datos.forEach(element => {
                                resp += `
                            <tr>
                                <td>${element.nombre}</td>
                            </tr>
                            `;
                                html += `
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td>${element.precio} USD</td>
                                <td>1</td>
                                <td>${element.precio} USD</td>
                            </tr>
                            `;
                            });
                            $('#json').text(resp);
                            $('#tblCarrito').html(html);
                            $('#total_pagar').text(res.total+" USD");
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            }
        }
    </script>    
 </body>
 </html>