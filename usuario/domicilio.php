<?php
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
    include '../ConexionBD/conexion.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/carrito.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Datos personales</title>
</head>

<body style="background-color: #e0e0df;">
    <?php include('../navProductos/navProductos.php'); ?>
    <br><br><br><br><br><br>
    <center>
        <div class="table-responsive" style="background: #626d71;">
            <table table border="2" class="table table-striped table-sm" style="width: 90%;">
                <thead style="background-color: #b38867;">
                    <tr>
                        <th scope="col" colspan="2" style="width: 50%;"><h4>Datos personales</h4></th>
                        <th scope="col" colspan="2" style="width: 50%;"><h4>Dirección</h4></th>
                    </tr>
                </thead>
                <tbody style="background-color: #ddbc95;">
                    <?php
                    $resultado1 = $conexion->query("SELECT * FROM usuarios WHERE Usuario = '$usuario' ") or die($conexion->error);
                    $mostrar1 = mysqli_fetch_array($resultado1); ?>
                    <?php
                    $resultado = $conexion->query("SELECT * FROM direccion WHERE Usuario = '$usuario' ") or die($conexion->error);
                    $mostrar = mysqli_fetch_array($resultado); ?>
                    <tr class="text-center">
                        <td colspan="2"><img src="../assets/img/Usuario.png" width="100px" height="100px"></td>
                        <td colspan="2"><img src="../assets/img/Direccion.png" width="100px" height="100px"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><h4><?php echo $mostrar1["Nombre"]; ?> <?php echo $mostrar1["Apellidos"]; ?></h4></td>
                        <td style="background-color: #cdcdc0;"><h4>Alcaldía:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar["Alcaldia"]; ?></h5></td>
                    </tr>
                    <tr>
                        <td style="background-color: #cdcdc0;"><h4><i class="fa-solid fa-user"></i> Usuario:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $usuario; ?></h5></td>
                        <td style="background-color: #cdcdc0;"><h4>Colonia:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar["Colonia"]; ?></h5></td>
                    </tr>
                    <tr>
                        <td style="background-color: #cdcdc0;"><h4><i class="fa-solid fa-envelope-open"></i> Correo electronico:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar1["CorreoElectronico"]; ?></h5></td>
                        <td style="background-color: #cdcdc0;"><h4>Calle:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar["Calle"]; ?></h5></td>
                    </tr>
                    <tr>
                        <td style="background-color: #cdcdc0;"><h4><i class="fa-solid fa-phone"></i> Teléfono:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar1["Telefono"]; ?></h5></td>
                        <td style="background-color: #cdcdc0;"><h4>Código postal:</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar["CP"]; ?></h5></td>
                    </tr>
                    <tr>
                        <td style="background-color: #cdcdc0;"><h4>Género</h4></td>
                        <td><h5 style="text-decoration: underline;"><?php echo $mostrar1["Genero"]; ?></h5></td>
                        <td style="background-color: #cdcdc0;"><h5>Num.Interior</h5></td>
                        <td style="background-color: #cdcdc0;"><h5>Num.Exterior</h5></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><h5 class="text-center" style="text-decoration: underline;"><?php echo $mostrar["NumInt"]; ?></h5></td>
                        <td><h5 class="text-center" style="text-decoration: underline;"><?php echo $mostrar["NumExt"]; ?></h5></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="background-color: #cdcdc0;"><h4>Referencia:</h4></td>
                        <td colspan="2"><h5><?php echo $mostrar["Referencia"]; ?></h5></td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="4"><a href="actualizar.php?usuario=<?php echo $mostrar['Usuario'] ?>" class="btn btn-success btn-md">Modificar dirección</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </center>
</body>
<?php include('../footer.php'); ?>

</html>