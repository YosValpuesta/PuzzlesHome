<?php
include '../ConexionBD/conexion.php';
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
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/productosAdmin.css">
    <title>Busqueda: </title>
</head>

<body>
    <h1>Buscando resultados para: "<?php echo $_GET['busqueda']; ?>"</h1>

    <div class="table-responsive" id="mostrarProductos">
        <table border="8" class="table table-striped table-sm">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoría</th>
                <th scope="col">No_Piezas</th>
                <th scope="col">Marca</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Imagen</th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                <?php
                while ($mostrar = $resultado->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $mostrar["id_Producto"]; ?></td>
                        <td><?php echo $mostrar["Nombre"]; ?></td>
                        <td><?php echo $mostrar["Categoria"]; ?></td>
                        <td><?php echo $mostrar["Piezas"]; ?></td>
                        <td><?php echo $mostrar["Marca"]; ?></td>
                        <td>$<?php echo $mostrar["Precio"]; ?></td>
                        <td><?php echo $mostrar["Stock"]; ?></td>
                        <td id="botones">
                            <img width="120px" height="85px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>">
                        </td>
                        <td id="botones">
                            <br><a href="vistaModificar.php?id=<?php echo $mostrar['id_Producto'] ?>" class="btn btn-success btn-sm">Modificar</a>
                        </td>
                        <td id="botones">
                            <br><a href="CRUD/eliminar.php?id=<?php echo $mostrar['id_Producto'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>