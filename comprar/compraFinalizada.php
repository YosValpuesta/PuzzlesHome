<?php
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
    include '../ConexionBD/conexion.php';
    if (!isset($_SESSION['MiCarrito'])) {
        header('Location: ../index.php');
    }
    $arreglo = $_SESSION['MiCarrito'];
    $subTotal = 0; //Cada producto
    $total = 0; //Suma productos
    $totalEnvio = 0;
    srand(time()); //Numeros aleatoreos
    $numero_pedido = rand(1000, 10000);
    for ($i = 0; $i < count($arreglo); $i++) {
        $subTotal = $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
        $total = $total + $subTotal;
        if ($total >= 999) {
            $totalEnvio = $total;
        } else {
            $totalEnvio = $total + 150;
        }
    }
    //Siempre que se haga una compra
    $fecha_actual = date("d-m-Y");
    $fecha = date("d-m-Y", strtotime($fecha_actual . " - 1 days"));
    $conexion->query("INSERT INTO ventas (Usuario, Total, Fecha, Folio) VALUES ('YosValpuesta', '$totalEnvio', CURRENT_TIMESTAMP-1 ,'$numero_pedido')") or die($conexion->error);
    $id_venta = $conexion->insert_id;
    for ($i = 0; $i < count($arreglo); $i++) {
        $conexion -> query("INSERT INTO productos_venta(id_Venta, id_Producto, Cantidad, Subtotal)
                    VALUES($id_venta, ".$arreglo[$i]['Id'].", ".$arreglo[$i]['Cantidad'].", ".$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'].")") or die($conexion -> error);
        $conexion->query("UPDATE productos SET Stock = Stock -" . $arreglo[$i]['Cantidad'] . " WHERE id_Producto = " . $arreglo[$i]['Id']) or die($conexion->error);
    }
    unset($_SESSION['MiCarrito']);
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
    <title>Compra finalizada</title>
</head>

<body>
    <?php include '../navProductos/navProductos.php' ?>
    <br><br><br><br><br><br>
    <center>
        <div class="table-responsive">
            <table>
                <table border="2" class="table table-striped table-sm">

                    <thead>
                        <tr>
                            <th scope="col" colspan="2">
                                <h1>Tu pedido: <?php echo $numero_pedido ?> Ya Fue programado con Éxito</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="comprar">
                        <tr>
                            <td class="text-center">
                                <input class="btn btn-success btn-lg" onclick="window.location='../index.php'" type="submit" value="Ir a inicio">
                            </td>
                        <tr>
                    </tbody>
                </table>
            </table>
        </div>
    </center>
    <br><br><br><br>
</body>
<?php include('../footer.php'); ?>

</html>