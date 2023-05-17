<?php
//Reviso si existe una sesión usuario
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
    include '../ConexionBD/conexion.php';
    $nombre = "";
    $piezas = "";
    $marca = "";
    $precio = "";
    $imagen = "";
    $cantidad = "";
    $stock = "";
    //Reviso si existe una sesión carrito
    if (isset($_SESSION['MiCarrito'])) {
        //Si existe buscamos si ya estaba agregado el producto
        if (isset($_GET['id'])) {
            $arreglo = $_SESSION['MiCarrito'];
            $encontro = false;
            $numero = 0;
            for ($i = 0; $i < count($arreglo); $i++) {
                if ($arreglo[$i]['Id'] == $_GET['id']) {
                    $encontro = true;
                    $numero = $i;
                }
            }
            if ($encontro == true) {
                $cantidad = $_POST["cantidad"];
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + $cantidad;
                $_SESSION['MiCarrito'] = $arreglo;
            } else {
                $resultado = $conexion->query('SELECT * FROM productos WHERE id_Producto = ' . $_GET['id']) or die($conexion->error);
                $mostrar = mysqli_fetch_row($resultado);
                $nombre = $mostrar[1];
                $piezas = $mostrar[3];
                $marca = $mostrar[4];
                $precio = $mostrar[5];
                $imagen = $mostrar[7];
                $stock = $mostrar[6];
                $cantidad = $_POST["cantidad"];
                if ($cantidad > 0) {
                    if ($cantidad <= $stock) {
                        $arregloNuevo = array(
                            'Id' => $_GET['id'],
                            'Nombre' => $nombre,
                            'Piezas' => $piezas,
                            'Marca' => $marca,
                            'Precio' => $precio,
                            'Imagen' => $imagen,
                            'Cantidad' => $cantidad,
                            'Stock' => $stock
                        );
                        array_push($arreglo, $arregloNuevo);
                        $_SESSION['MiCarrito'] = $arreglo;
                    } else
                        echo "<script>alert('La cantidad deseada exede el numero de productos disponibles');</script>";
                }
            }
        }
    } else {
        //Creamos la varible
        if (isset($_GET['id'])) {
            $resultado = $conexion->query('SELECT * FROM productos WHERE id_Producto = ' . $_GET['id']) or die($conexion->error);
            $mostrar = mysqli_fetch_row($resultado);
            $nombre = $mostrar[1];
            $piezas = $mostrar[3];
            $marca = $mostrar[4];
            $precio = $mostrar[5];
            $imagen = $mostrar[7];
            $stock = $mostrar[6];
            $cantidad = $_POST["cantidad"];
            if ($cantidad > 0) {
                if ($cantidad <= $stock) {
                    $arreglo[] = array(
                        'Id' => $_GET['id'],
                        'Nombre' => $nombre,
                        'Piezas' => $piezas,
                        'Marca' => $marca,
                        'Precio' => $precio,
                        'Imagen' => $imagen,
                        'Cantidad' => $cantidad,
                        'Stock' => $stock
                    );
                    $_SESSION['MiCarrito'] = $arreglo;
                } else
                    echo "<script>alert('La cantidad deseada exede el numero de productos disponibles');</script>";
            }
        }
    }
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
    <title>Mi carrito de compras</title>
</head>

<body>
    <?php include('../navProductos/navProductos.php'); ?>
    <br><br><br><br><br>
    <center>
        <div class="table-responsive">
            <table border="5" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">SubTotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subTotal = 0; //Cada producto
                    $total = 0; //Suma productos
                    $totalEnvio = 0;
                    if (isset($_SESSION['MiCarrito'])) {
                        $arregloCarrito = $_SESSION['MiCarrito'];
                        for ($i = 0; $i < count($arregloCarrito); $i++) {
                            $subTotal = $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'];
                            $total = $total + $subTotal;
                            if ($total >= 999) {
                                $totalEnvio = $total;
                            } else {
                                $totalEnvio = $total + 150;
                            }
                    ?>
                            <tr>
                                <td id="imagen">
                                    <center><img width="130px" height="95px" src="data:image/png;base64,<?php echo base64_encode($arregloCarrito[$i]['Imagen']); ?>"></center>
                                </td>
                                <td id="datos">
                                    <h5><?php echo $arregloCarrito[$i]['Nombre']; ?></h5>
                                    <h5>Piezas: <?php echo $arregloCarrito[$i]['Piezas']; ?></h5>
                                    <h5>Marca: <?php echo $arregloCarrito[$i]['Marca']; ?></h5>
                                </td>
                                <td id="producto">
                                    <h4>$<?php echo $arregloCarrito[$i]['Precio']; ?>.00</h4>
                                </td>
                                <td id="producto">
                                    <h4><?php echo $arregloCarrito[$i]['Cantidad']; ?></h4>
                                </td id="producto">
                                <td id="producto" class="cant<?php echo $arregloCarrito[$i]['Id']; ?>">
                                    <h4>$<?php echo number_format($subTotal, 2, '.', ''); ?></h4>
                                </td>
                                <td id="producto">
                                    <a class="btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id']; ?>">Eliminar</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <table border="4" id="tableTotal" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Total a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>SubTotal:</b></td>
                        <td class="text-center">
                            <h5>$<?php echo number_format($total, 2, '.', ''); ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <b>
                            <td>Envío:
                            <td class="text-center">
                                <?php if ($total >= 999) {
                                    echo ("<h5>Envio gratis</h5>");
                                } else {
                                    echo ("<h5>$150.00</h5>");
                                } ?>
                            </td>
                        </b>
                    </tr>
                    <tr>
                        <td><b>Total:</b></td>
                        <td class="text-center">
                            <h5>$<?php echo number_format($totalEnvio, 2, '.', ''); ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">
                            <input class="btn btn-warning btn-sm" onclick="window.location='../comprar/comprar.php'" type="submit" value="Proceder al pago" name="btnPago">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>

    <!--Eliminar producto en carrito-->
    <script>
        $(document).ready(function() {
            $(".btnEliminar").click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var boton = $(this);
                $.ajax({
                    method: 'POST',
                    url: 'eliminar.php',
                    data: {
                        id: id
                    }
                }).done(function(respuesta) {
                    boton.parent('td').parent('tr').remove();
                });
            });
        });
    </script>
    <br>
</body>
<?php include('../footer.php'); ?>

</html>