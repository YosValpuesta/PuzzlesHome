<?php
//Reviso si existe una sesión usuario
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
    include '../ConexionBD/conexion.php';
    $resultado = $conexion->query("SELECT DATE_FORMAT(Fecha,'%d/%m/%Y') AS Fecha, Folio, Cantidad, Subtotal, Nombre, Precio, Imagen
                                FROM ventas AS a 
                                INNER JOIN productos_venta AS b ON b.id_Venta = a.id_Venta 
                                INNER JOIN productos AS c ON b.id_Producto = c.id_Producto
                                WHERE Usuario = 'YosValpuesta' GROUP BY Nombre") or die($conexion->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> <!--Libreria JQuery-->
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/carrito.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Mis compras: <?php echo $usuario ?></title>
</head>

<body>
    <?php include('../navProductos/navProductos.php'); ?>
    <br><br><br><br><br>
    <center>
        <div class="table-responsive">
            <table border="5" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td scope="col">Fecha</td>
                        <td scope="col">No_Pedido</td>
                        <td scope="col" colspan="2">Producto</td>
                        <td scope="col">Precio</td>
                        <td scope="col">Cantidad</td>
                        <td scope="col">SubTotal</td>
                    </tr>
                </thead>
                <?php
                while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                    <tbody>
                        <tr class="text-center">
                            <td><h5><?php echo ($mostrar["Fecha"]); ?><h5></td>
                            <td><h5><?php echo ($mostrar["Folio"]); ?><h5></td>
                            <td>
                                <img width="130px" height="95px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
                            </td>
                            <td><h5><?php echo $mostrar["Nombre"]; ?><h5></td>
                            <td><h5><?php echo $mostrar["Precio"]; ?><h5></td>
                            <td><h5><?php echo $mostrar["Cantidad"]; ?><h5></td>
                            <td><h5><?php echo $mostrar["Subtotal"]; ?><h5></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </center>
    <br>
</body>
<?php include('../footer.php'); ?>

</html>