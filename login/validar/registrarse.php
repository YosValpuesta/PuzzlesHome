<?php
include_once('../../ConexionBD/conexion.php');

$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$telefono = $_POST['Telefono'];
$usuario = $_POST['Usuario'];
$correo = $_POST['CorreoElectronico'];
$contraseña = $_POST['Contraseña'];
$cont = strlen($contraseña);
$cont1 = strlen($telefono);

$resultado  = $conexion->query("SELECT Usuario from usuarios WHERE CorreoElectronico = '$correo' ") or die($conexion->error);
if ($verificar = mysqli_fetch_array($resultado)) {
    header("location: ../registro.php?error=El correo ya está registrado");
    exit();
} else {
    $resultado  = $conexion->query("SELECT Usuario from usuarios WHERE Usuario = '$usuario' ") or die($conexion->error);
    if ($verificar = mysqli_fetch_array($resultado)) {
        header("location: ../registro.php?error=El usuario ya existe");
        exit();
    } 
    if ($cont > 15) {
        header("location: ../registro.php?error=La contraseña debe tener 8-15 dígitos");
        exit();
    }  else {
        if ($cont1 > 10 ) {
            header("location: ../registro.php?error=El número de telefono es incorrecto");
            exit();
        } 
    }
$conexion -> query("INSERT INTO usuarios (Usuario, CorreoElectronico, Contraseña, Nombre, Apellidos, Telefono) 
                        VALUES ('$usuario','$correo','$contraseña','$nombre','$apellidos','$telefono')") 
                        or die($conexion -> error);
} 

header("location: ../registro.php?success=Registrado con éxito, inicia sesión ");
exit();


