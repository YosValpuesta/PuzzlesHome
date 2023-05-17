<?php
    include '../../ConexionBD/conexion.php';

    $id = $_REQUEST['id'];
    $nombre = $_POST['Nombre'];
    $piezas = $_POST['Piezas'];
    $precio = $_POST['Precio'];
    $stock = $_POST['Stock'];
    $imagen = addslashes(file_get_contents($_FILES["Imagen"]["tmp_name"])); //Guarda los bits 
    $img2 = addslashes(file_get_contents($_FILES["Img2"]["tmp_name"])); //Guarda los bits 

    $productos = "UPDATE productos SET Nombre = '$nombre', Piezas = '$piezas', 
                    Precio = '$precio', Stock = '$stock', Imagen = '$imagen', Img2 = '$img2' 
                    WHERE id_Producto = '$id' ";
    $resultado = $conexion->query($productos);

if ($resultado){
    Header("Location: ../indexAdmin.php");
} else {
    echo "error";
}
?>