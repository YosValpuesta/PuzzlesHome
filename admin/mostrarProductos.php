<link rel="stylesheet" href="../assets/css/productosAdmin.css">
<link rel="icon" href="../assets/img/Logo.png">

<?php
include '../ConexionBD/conexion.php';
$productos = "SELECT * FROM productos";
$resultado = $conexion->query($productos);
?>

<center>
    <h1>Productos registrados</h1>
</center>

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