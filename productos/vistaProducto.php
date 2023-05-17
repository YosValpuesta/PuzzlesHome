<?php
//Vista del producto
include('../ConexionBD/conexion.php');
if (isset($_GET['id'])) {
    $resultado = $conexion->query("SELECT * FROM productos WHERE id_Producto = " . $_GET['id']) or die($conexion->error);
    if (mysqli_num_rows($resultado) > 0) {
        $mostrar = mysqli_fetch_row($resultado);
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
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
    <link rel="stylesheet" href="../assets/css/productos.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>PuzzlesHome: <?php echo $mostrar[1]; ?></title>
</head>

<body style="background-color: #e0e0df;">
    <?php
    //Reviso si existe una sesión activa
    session_start();
    if (isset($_SESSION['Usuario'])) {
        $usuario = $_SESSION['Usuario'];
        include('../navProductos/navProductos.php');
    } else {
        include('../navProductos/navProductosSin.php');
    }
    ?>
    <br><br>
    <center>
        <div class="card mb-3" style="padding-top: 11.5%; width: 85%; background-color: transparent; border: none;">
            <div class="row g-0">
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="data:image/png;base64,<?php echo base64_encode($mostrar[7]); ?>" class="img-fluid rounded-start" alt="ImagenProducto">
                            </div>
                            <?php if ($mostrar[9] != NULL) { ?>
                                <div class="carousel-item">
                                    <img src="data:image/png;base64,<?php echo base64_encode($mostrar[9]); ?>" class="img-fluid rounded-start" alt="ImagenProducto">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-start">
                    <div class="card-body" style="background-color: #336B87; height: 100%; font-family: 'Comfortaa', cursive; font-size: 16px;">
                        <h1 class="card-title text-center" style="margin: .3rem;  padding-top: 0;  background-color: #90afc5; color:black"><?php echo $mostrar[1]; ?>: <?php echo $mostrar[2]; ?></h1>
                        <div class="card-informacion" style="max-width: 31.7rem; max-height: fit-content; margin-left: .3rem;">
                            <ul class="list-group list-group-flush">
                                <strong>
                                    <?php if ($mostrar[3] != NULL) { ?>
                                        <li class="list-group-item" style="background-color: white;"><?php echo $mostrar[3]; ?> Piezas</li>
                                    <?php } ?>
                                    <li class="list-group-item" style="background-color: white;">Marca: <u><?php echo $mostrar[4]; ?></u></li>
                                    <li class="list-group-item" style="font-size: 25px; background-color: white;">$<?php echo $mostrar[5]; ?></li>
                                    <?php
                                    //Para comprar el producto debe iniciar sesion
                                    if (isset($_SESSION['Usuario'])) { ?>
                                        <form action="../carrito/carrito.php?id=<?php echo $mostrar[0] ?>" method="POST">
                                            <li class="list-group-item" style="background-color: white;">Cantidad: <input type="number" name="cantidad" REQUIRED value="1" style="width: 4rem;"></li>
                                            <li class="list-group-item text-center" style="background-color: white;"><i class="fa-solid fa-cart-shopping"></i>
                                                <input class="btn" style="padding: 0.5rem -25rem; border-radius: 1.7rem; background-color: #90afc5; border: none;" type="submit" name="btnAñadir" value="Añadir al carrito">
                                            </li>
                                        </form>
                                    <?php
                                    } else { ?>
                                        <script>
                                            alert('Inicia sesion para poder añadir productos al carrito');
                                        </script>
                                    <?php
                                    }
                                    ?>
                                </strong>
                                <li class="list-group-item" style="background-color: white;">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item" style="font-size: 15px;">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    Descripción del producto
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body"><?php echo $mostrar[8]; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <h1 class="text-center" style="padding-top: 0;">Productos similares</h1>
    <div class="container ">
        <div class="row gy-3">
            <?php
            $resultado = $conexion->query("SELECT * FROM productos WHERE id_Producto != $mostrar[0] ORDER BY RAND() limit 4 ") or die($conexion->error);
            while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <center><img width="230px" height="185px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></center>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $mostrar["Nombre"]; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Categoría: <br><strong><?php echo $mostrar["Categoria"]; ?></strong></li>
                            <li class="list-group-item">Marca: <strong><?php echo $mostrar["Marca"]; ?></strong></li>
                            <li class="list-group-item" id="precio"><strong>$<?php echo $mostrar["Precio"]; ?></li></strong>
                            <li class="list-group-item text-center">
                                <form action="vistaProducto.php?id=<?php echo $mostrar['id_Producto']; ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" class="btn btn-outline-danger">Ver producto</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <br>
</body>
<?php include('../footer.php'); ?>

</html>