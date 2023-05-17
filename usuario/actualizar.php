<?php
//Reviso si existe una sesión activa
session_start();
if (isset($_SESSION['Usuario'])) {
    include("../ConexionBD/conexion.php");
    $usuario = $_REQUEST["usuario"];
    $direccion = "SELECT * FROM direccion WHERE Usuario = '$usuario' ";
    $resultado = $conexion->query($direccion);
    $mostrar = $resultado->fetch_assoc();
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
    <title>Actualizar datos</title>
</head>

<body style="background-color: #e0e0df;">
    <?php include('../navProductos/navProductos.php'); ?>
    <br><br><br><br><br><br>
    <center>
        <div class="table-responsive" style="background: #626d71;">
            <form action="modificar.php?usuario=<?php echo $mostrar["Usuario"]; ?>" method="POST" enctype="multipart/form-data">
                <table table border="2" class="table table-striped table-sm" style="width: 90%;">
                    <thead style="background-color: #b38867;">
                        <tr>
                            <th scope="col" colspan="4" style="width: 50%;"><h4>Dirección</h4></th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #ddbc95;">
                        <tr>
                            <td style="background-color: #cdcdc0;"><h4>Alcaldía:</h4></td>
                            <td>
                                <select name="Alcaldia" aria-label=".form-select-sm example">
                                    <option><?php echo $mostrar["Alcaldia"]; ?></option>
                                    <option value="Álvaro Obregón">Álvaro Obregón</option>
                                    <option value="Azcapotzalco">Azcapotzalco</option>
                                    <option value="Benito Juárez">Benito Juárez</option>
                                    <option value="Coyoacán">Coyoacán</option>
                                    <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
                                    <option value="Cuauhtémoc">Cuauhtémoc</option>
                                    <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                                    <option value="Iztacalco">Iztacalco</option>
                                    <option value="Iztapalapa">Iztapalapa</option>
                                    <option value="Magdalena Contreras">Magdalena Contreras</option>
                                    <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                                    <option value="Milpa Alta">Milpa Alta</option>
                                    <option value="Tláhuac">Tláhuac</option>
                                    <option value="Venustiano Carranza">Venustiano Carranza</option>
                                    <option value="Xochimilco">Xochimilco</option>
                                </select>
                            </td>
                            <td style="background-color: #cdcdc0;"><h4>Colonia:</h4></td>
                            <td><input type="text" REQUIRED class="form-control mb-3" name="Colonia" placeholder="Colonia" value="<?php echo $mostrar["Colonia"]; ?>"></td>
                        </tr>
                        <tr>
                            <td style="background-color: #cdcdc0;"><h4>Calle(s):</h4></td>
                            <td><input type="text" REQUIRED class="form-control mb-3" name="Calle" placeholder="Calle" value="<?php echo $mostrar["Calle"]; ?>"></td>
                            <td style="background-color: #cdcdc0;"><h4>CP:</h4></td>
                            <td><input type="text" REQUIRED class="form-control mb-3" name="CP" placeholder="CP" value="<?php echo $mostrar["CP"]; ?>"></td>
                        </tr>
                        <tr>
                            <td style="background-color: #cdcdc0;"><h4>Num.Int:</h4></td>
                            <td><input type="text" class="form-control mb-3" name="NumInt" placeholder="NumInt" value="<?php echo $mostrar["NumInt"]; ?>"></td>
                            <td style="background-color: #cdcdc0;"><h4>Num.Ext:</h4></td>
                            <td><input type="text" class="form-control mb-3" name="NumExt" placeholder="NumExt" value="<?php echo $mostrar["NumExt"]; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="background-color: #cdcdc0;">
                                <h4>Referencia:</h4>
                                <input type="text" REQUIRED class="form-control mb-3" name="Referencia" placeholder="Referencia" value="<?php echo $mostrar["Referencia"]; ?>">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4"><input type="submit" class="btn btn-dark" value="Guardar cambios"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </center>
</body>
<?php include('../footer.php'); ?>

</html>