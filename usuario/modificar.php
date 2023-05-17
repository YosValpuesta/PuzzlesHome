<?php
//Reviso si existe una sesión activa
session_start();
if (isset($_SESSION['Usuario'])) {
    include("../ConexionBD/conexion.php");
    $usuario = $_REQUEST["usuario"];  
    $alcaldia = $_POST['Alcaldia'];
    $calle = $_POST['Calle'];
    $colonia = $_POST['Colonia'];
    $cp = $_POST['CP'];
    $numInt = $_POST['NumInt'];
    $numExt = $_POST['NumExt'];
    $referencia = $_POST['Referencia'];
    $productos = "UPDATE direccion SET Alcaldia = '$alcaldia', Calle = '$calle', 
                    Colonia = '$colonia', CP = '$cp', NumInt = '$numInt', NumInt = '$numExt', Referencia = '$referencia'
                    WHERE Usuario = '$usuario' ";
    $resultado = $conexion->query($productos);
if ($resultado){
    Header("Location: domicilio.php");
} else {
    echo "error";
}
}
