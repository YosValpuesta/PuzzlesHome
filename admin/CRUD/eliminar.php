<?php
    include '../../ConexionBD/conexion.php';
    $id = $_REQUEST['id'];

    $productos = "DELETE FROM productos WHERE id_Producto = '$id'";
    $resultado = $conexion->query($productos);

    if ($resultado) { 
        Header("Location: ../indexAdmin.php");
    } else {
        echo "error";
    }
?>