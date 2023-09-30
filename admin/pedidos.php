<?php
require_once "../config/conexion.php";

include("includes/header.php"); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
    <input class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" class=" fa-sm text-white-50" type="button" value="Actualizar" onclick="recargar()">
    <script>
        function recargar () {
            window.location.href = window.location.href;
        }
    </script>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Pedido</th>
                        <th>Direccion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY id DESC");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['celular']; ?></td>
                            <td><?php echo $data['pedido']; ?></td>
                            <td><?php echo $data['ubicacion']; ?></td>
                            <td>
                                <form method="post" action="eliminar.php?accion=ped&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-success" type="submit">Finalizar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>