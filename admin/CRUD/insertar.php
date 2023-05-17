<?php
    include '../../ConexionBD/conexion.php';
    $nombre = $_POST['Nombre'];
    $categoria = $_POST['Categoria'];
    $piezas = $_POST['Piezas']; 
    $marca = $_POST['Marca'];
    $precio = $_POST['Precio'];
    $stock = $_POST['Stock'];
    $imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 
    $descripcion = $_POST['Descripcion'];
    $img2 = addslashes(file_get_contents($_FILES["Img2"]["tmp_name"])); //Guarda los bits 

   $conexion -> query("INSERT INTO productos (Nombre, Categoria, Piezas, Marca, Precio, Stock, Imagen, Descripcion, Img2) 
                        VALUES ('$nombre','$categoria','$piezas','$marca','$precio','$stock','$imagen','$descripcion','$img2')") 
                        or die($conexion -> error); 

    if ($conexion) {
        Header("Location: ../indexAdmin.php");
    } else {
        echo "error";
    }
?>