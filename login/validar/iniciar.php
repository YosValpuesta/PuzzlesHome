<?php
include('../../ConexionBD/conexion.php');
session_start();

if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validate($_POST['Usuario']);
    $contraseña = validate($_POST['Contraseña']);

    $Sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Contraseña = '$contraseña' ";
    $resultado = mysqli_query($conexion, $Sql);
    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);
        if ($row['Usuario'] === $usuario && $row['Contraseña'] === $contraseña) {
            $_SESSION['Usuario'] = $usuario;
            if ($usuario == 'admin') {
                header("Location: ../../admin/indexAdmin.php");
                exit();
            } else {
                header("Location: ../../index.php");
                exit();
            }
        } else {
            header("Location: ../login.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    } else {
        header("Location: ../login.php?error=El usuario o la clave son incorrectas");
        exit();
    }
} 




/*
if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $usuario = validate($_POST['Usuario']);
    $contraseña = validate($_POST['Contraseña']);

    $Sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario' AND Contraseña = '$contraseña' ";
    $resultado = mysqli_query($conexion, $Sql);

    if (mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);
        if ($row['Usuario'] === $usuario && $row['Contraseña'] === $contraseña) {
            $_SESSION['Usuario'] = $row['Usuario'];
            header("Location: ../../index.php");
            exit();
        } else {
            header("Location: ../login.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    } else {
        header("Location: ../login.php?error=El usuario o la clave son incorrectas");
        exit();
    }
} 
*/
