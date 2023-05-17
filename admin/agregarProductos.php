<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/productosAdmin.css">
<link rel="icon" href="../assets/img/Logo.png">

<?php include '../ConexionBD/conexion.php' ?>

<center><h1>Llena los campos con la información del producto:</h1></center>

<div class="container">
    <div class="col-md-12">
        <form action="CRUD/insertar.php" method="POST" enctype="multipart/form-data">
            <input type="text" REQUIRED class="form-control mb-3" name="Nombre" placeholder="Nombre">
            <label for="select-Categoria">Selecciona la categoría</label>
            <select class="form-select form-control mb-3" name="Categoria" aria-label=".form-select-sm example">
                <option selected value="Rompecabezas">Rompecabezas</option>
                <option value="Rompecabezas 3D">Rompecabezas 3D</option>
                <option value="Rompecabezas 3D metal">Rompecabezas 3D metal</option>
                <option value="Rompecabezas infantil">Rompecabezas infantil</option>
                <option value="Rompecabezas madera">Rompecabezas madera</option>
                <option value="Rompecabezas panoramico">Rompecabezas panorámico</option>
                <option value="Rompecabezas desafiantes">Rompecabezas desafiantes</option>
                <option value="Rompecabezas terror">Rompecabezas terror</option>
                <option value="Accesorios">Accesorios</option>
            </select>
            <input type="text" class="form-control mb-3" name="Piezas" placeholder="Piezas">
            <label for="select-Marca">Selecciona la marca</label>
            <select class="form-select form-control mb-3" name="Marca" aria-label=".form-select-sm example">
                <option selected value="Anatolian">Anatolian</option>
                <option value="Buffalo Games">Buffalo Games</option>
                <option value="Eurographics">Eurographics</option>
                <option value="Ravensburger">Ravensburger</option>
                <option value="Fascinations">Fascinations</option>
                <option value="Novelty">Novelty</option>
                <option value="Heye">Heye</option>
                <option value="Trefl">Trefl</option>
                <option value="Pintoo">Pintoo</option>
                <option value="Ricordi">Ricordi</option>
            </select>
            <input type="text" REQUIRED class="form-control mb-3" name="Precio" placeholder="Precio">
            <input type="text" REQUIRED class="form-control mb-3" name="Stock" placeholder="Stock">
            <input type="file" REQUIRED class="form-control mb-3" name="Imagen" accept="image/*">
            <textarea REQUIRED class="form-control mb-3" cols="10" rows="5" name="Descripcion" placeholder="Descripcion"></textarea>
            <input type="file" class="form-control mb-3" name="Img2" accept="image/*">
            <center><input type="submit" class="btn btn-primary"></center>
        </form>
    </div>
</div>