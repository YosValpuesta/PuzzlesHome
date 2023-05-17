<?php
include 'ConexionBD/conexion.php';
$resultado = $conexion->query("SELECT * FROM productos ORDER BY RAND() limit 4") or die($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="assets/img/Logo.png">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/productos.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Principal: PuzzlesHome</title>
</head>

<body style="background-color: #e0e0df;">
    <?php
    //Reviso si existe una sesión activa
    session_start();
    if (isset($_SESSION['Usuario'])) {
        $usuario = $_SESSION['Usuario'];
        include('nav.php');
    } else { ?>
        <script>
            alert('Para realizar compras debes iniciar sesión');
        </script>
    <?php include('navSin.php');
    }
    ?>
    <br><br><br>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="padding-top: 10%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <a href="productos/rompecabezas.php"><img src="assets/img/Slider1.jpg" class="d-block w-100" alt="Slider1"></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡¡Encuentra rompecabezas para todas las edades!! </h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <a href="productos/accesorios.php"><img src="assets/img/Slider2.jpg" class="d-block w-100" alt="Slider2"></a>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Variedad de accesorios para rompecabezas</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/Slider3.jpg" class="d-block w-100" alt="Slider3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>¡¡Divierte armando los rompecabezas más grandes del mundo!!</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1 class="text-center" style="padding-top: 0rem;">Productos que te pueden gustar</h1>
    <div class="container ">
        <div class="row gy-3">
            <?php
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
                                <form action="productos/vistaProducto.php?id=<?php echo $mostrar['id_Producto']; ?>" method="POST" enctype="multipart/form-data">
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
<?php include('footer.php'); ?>

</html>