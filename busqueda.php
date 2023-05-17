<?php
include 'ConexionBD/conexion.php';
$resultado = $conexion->query("SELECT * FROM productos WHERE Nombre LIKE '%" . $_GET['busqueda'] . "%' 
                                OR Precio LIKE '%" . $_GET['busqueda'] . "%' 
                                OR Piezas LIKE '%" . $_GET['busqueda'] . "%'
                                OR Marca LIKE '%" . $_GET['busqueda'] . "%'
                                OR Categoria LIKE '%" . $_GET['busqueda'] . "%'") or die($conexion->error);
if (!isset($_GET['busqueda'])) {
    header("no");
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/img/Logo.png">
    <link rel="stylesheet" href="assets/css/carrito.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Busqueda: </title>
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
    <br><br><br><br><br><br>
    <h1 class="text-center" style="font-family: 'Kanit', sans-serif;">Buscando resultados para: "<?php echo $_GET['busqueda']; ?>"</h1>
    <center>
        <div class="table-responsive" id="mostrarProductos">
            <table border="5" class="table table-striped table-sm">
                <thead>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">No_Piezas</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    <?php
                    while ($mostrar = $resultado->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar["Nombre"]; ?></td>
                            <td><?php echo $mostrar["Categoria"]; ?></td>
                            <td><?php echo $mostrar["Piezas"]; ?></td>
                            <td><?php echo $mostrar["Marca"]; ?></td>
                            <td>$<?php echo $mostrar["Precio"]; ?></td>
                            <td id="botones">
                                <img width="120px" height="85px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
                            </td>
                            <td id="botones">
                                <form action="productos/vistaProducto.php?id=<?php echo $mostrar['id_Producto']; ?>" method="POST" enctype="multipart/form-data">
                                    <button type="submit" class="btn btn-outline-danger" style="color: #ffffff; border-color: #000000; background-color: #2d4262;">Ver producto</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </center>
    <br><br>
</body>
<?php include('footer.php'); ?>