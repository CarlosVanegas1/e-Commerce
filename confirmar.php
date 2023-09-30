<?php
$servername = "localhost"; // Nombre/IP del servidor
$database = "card"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
// Creamos la conexión
$con = mysqli_connect($servername, $username, $password, $database);
// Comprobamos la conexión
if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
if (isset($_POST)) {
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $ubicacion = $_POST['ubicacion'];
        $res = $_POST['pedido'];
        $query = "INSERT INTO pedidos(nombre, celular, pedido,ubicacion)
        VALUES ('$nombre', '$celular', 'pastel', '$ubicacion')";
        $resultado = mysqli_query($con, $query);
        if ($resultado){

            echo "<script language= 'JavaScript'>
                                    alert('Su pedido ha sido realizado con Exito, vuelva a la tienda');
                                    location.assign('index.php')
                                    </script>";
        } else {
        }
}?>