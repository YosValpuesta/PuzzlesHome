<?php
//Reviso si existe una sesión usuario
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
    include '../ConexionBD/conexion.php';
    if (!isset($_SESSION['MiCarrito'])) {
        header('Location: ../productos/rompecabezas.php');
    }
    //$resultado = $conexion->query("SELECT * FROM domicilio WHERE cliente_id = 60") or die($conexion->error);
    //$mostrar = mysqli_fetch_row($resultado);
    //Toma la fecha actual al momento de la compra
    $fecha_actual = date("d-m-Y");
    $arreglo = $_SESSION['MiCarrito'];
} else {
    echo "<script> alert('No has iniciado sesión'); </script> ";
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
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/carrito.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Comprar</title>
</head>

<body>
    <?php include('../navProductos/navProductos.php'); ?>
    <br><br><br><br><br>
    <center>
        <div class="table-responsive">
            <table border="2" class="table table-striped table-sm">
                <h1>Revisa y confirma tu compra</h1>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Detalles de la entrega</th>
                    </tr>
                </thead>
                <tbody id="comprar">
                    <tr>
                        <td id="datos">
                            <?php $fecha = date("d-m-Y", strtotime($fecha_actual . " - 1 days")); ?>
                            <h5>Fecha de entrega: <?php echo date("d-m-Y", strtotime($fecha_actual . "+ 5 days"));  ?></h5>
                            <?php //echo $usuario ?>
                        </td>
                    <tr>
                </tbody>
            </table>

            <table border="2" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Detalles del producto(s)</th>
                    </tr>
                </thead>
                <tbody id="comprar">
                    <?php
                    for ($i = 0; $i < count($arreglo); $i++) {
                        $subTotal = $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
                        $total = 0; //Suma productos
                        $totalEnvio = 0;
                        $total = $total + $subTotal;
                        if ($total >= 999) {
                            $totalEnvio = $total;
                        } else {
                            $totalEnvio = $total + 150;
                        }
                    ?>
                        <tr>
                            <td><?php echo $arreglo[$i]['Nombre']; ?></td>
                            <td>$<?php echo number_format($arreglo[$i]['Precio'], 2, '.', ''); ?></td>
                        </tr>
                        <tr>
                            <td>Cantidad</td>
                            <td><?php echo $arreglo[$i]['Cantidad']; ?></td>
                        </tr>
                        <tr>
                            <td>SubTotal</td>
                            <td>$<?php echo $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']; ?></td>
                        </tr>
                        <tr>
                            <td style="background-color: #2a3132;" scope="col" colspan="2"></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td>Total</td>
                        <td>$<?php echo $total; ?></td>
                    </tr>
                    <tr>
                        <td><b>Envio: </b></td>
                        <th>
                            <?php
                            if ($total >= 999) {
                                echo '$0';
                            } else {
                                echo '$150';
                            }
                            ?>
                        </th>
                    <tr>
                </tbody>
            </table>

            <table border="2" class="table table-striped table-sm">
                <tbody id="comprar">
                    <tr>
                        <td scope="col">Total a pagar: </td>
                        <td scope="col">$<?php echo number_format($totalEnvio, 2, '.', ''); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <input class="btn btn-success btn-sm" onclick="window.location='CompraFinalizada.php'" type="submit" value="Confirmar compra">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>
<?php include('../footer.php'); ?>

</html>