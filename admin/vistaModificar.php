<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/productosAdmin.css">
<link rel="icon" href="../assets/img/Logo.png">

<?php
include '../ConexionBD/conexion.php';
$id = $_REQUEST['id'];
$productos = "SELECT * FROM productos WHERE id_Producto = '$id' ";
$resultado = $conexion->query($productos);
$mostrar = $resultado->fetch_assoc();
?>

<center>
    <h1>Modificar datos del producto</h1>
</center>

<div class="container">
    <div class="col-md-12">
        <form action="CRUD/modificar.php?id=<?php echo $mostrar["id_Producto"]; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" REQUIRED class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $mostrar["Nombre"]; ?>">
            <label>Categoria:</label> 
            <select class="form-select form-control mb-3" name="Categoria" aria-label=".form-select-sm example">
                <option selected><?php echo $mostrar["Categoria"]; ?></option>
            </select>
            <label>Número de piezas:</label>
            <input type="text" class="form-control mb-3" name="Piezas" placeholder="Piezas" value="<?php echo $mostrar["Piezas"]; ?>">
            <label for="select-Marca">Marca:</label>
            <select class="form-select form-control mb-3" name="Marca" aria-label=".form-select-sm example">
                <option selected><?php echo $mostrar["Marca"]; ?></option>
            </select>    
            <label>Precio:</label>
            <input type="text" REQUIRED class="form-control mb-3" name="Precio" placeholder="Precio" value="<?php echo $mostrar["Precio"]; ?>">
            <label>Stock:</label>
            <input type="text" REQUIRED class="form-control mb-3" name="Stock" placeholder="Stock" value="<?php echo $mostrar["Stock"]; ?>">
            <center><img width="170px" height="130px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Imagen"]); ?>"></center><br>
            <input type="file" REQUIRED class="form-control mb-3" name="Imagen" accept="image/*">
            <textarea class="form-control mb-3" cols="10" rows="5" name="Descripcion" placeholder="Descripcion"><?php echo $mostrar["Descripcion"]; ?></textarea>
            <center><img width="170px" height="130px" src="data:image/png;base64,<?php echo base64_encode($mostrar["Img2"]); ?>"></center><br>
            <input type="file" class="form-control mb-3" name="Img2" accept="image/*">
            <center><input type="submit" class="btn btn-primary" value="Actualizar"></center>
        </form>
    </div>
</div>