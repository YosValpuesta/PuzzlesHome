<?php include('../ConexionBD/conexion.php'); ?>

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
    <title>Rompecabezas 3D</title>
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
    <br><br><br><br>
    <h1 class="text-center">Productos en venta: Rompecabezas 3D plástico</h1>
    <?php
    //Paginador
    $limite = 4;
    $pagina = '';
    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
    } else {
        $pagina = 1;
    }
    $inicio = ($pagina - 1) * $limite;
    $resultado = $conexion->query("SELECT * FROM productos WHERE Categoria = 'Rompecabezas 3D' LIMIT $inicio,$limite") or die($conexion->error);
    ?>

    <div class="container ">
        <div class="row gy-3">
            <?php
            $numero = 0;
            while ($mostrar = mysqli_fetch_array($resultado)) {
                $numero++;
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

    <?php
    //Paginador
    $pagina_consulta = "SELECT * FROM productos WHERE Categoria = 'Rompecabezas 3D' ";
    $pagina_resultado = mysqli_query($conexion, $pagina_consulta);
    $total = mysqli_num_rows($pagina_resultado);
    $total_paginas = ceil($total / $limite);
    $inicio = $pagina;
    $diferencia = $total_paginas - $pagina;
    if ($diferencia <= 4) {
        $inicio = $total_paginas - 4;
    }
    $fin = $inicio + 4;
    ?>

    <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <?php if ($pagina > 1) { ?>
                <li class="page-item <?php echo $_GET['pagina'] <= 0 ? 'disabled' : '' ?> ">
                    <?php echo "<a class='page-link' href='3D.php?pagina=" . ($pagina - 1) . "'> Anterior </a>"; ?>
                </li>
            <?php
            }
            for ($i = 1; $i <= $fin; $i++) { ?>
                <li class="page-item <?php echo $_GET['pagina'] == $i ? 'active' : '' ?>">
                    <?php echo "<a class='page-link' href='3D.php?pagina=" . $i . "'>" . $i . "</a>"; ?>
                </li>
            <?php
            }
            if ($pagina <= $fin - 1) { ?>
                <li class="page-item">
                    <?php echo "<a class='page-link' href='3D.php?pagina=" . ($pagina + 1) . "'> Siguiente</a>"; ?>
                </li>
            <?php } ?>
        </ul>
    </nav>
</body>
<?php include('../footer.php'); ?>

</html>