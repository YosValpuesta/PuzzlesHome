<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/registrarse.css">
    <title>Registrarse</title>
</head>

<body>
    <h1 id="titulo" class="text-center">PuzzlesHome </h1>
    <form action="validar/registrarse.php" method="POST">
        <h1 class="text-center">Registro de cuenta</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <br>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"> <?php echo $_GET['success']; ?><a href="login.php"> 'Clic aquí'</a></p>
        <?php } ?>
        <hr>
        <div class="container" id="informacionCuenta">
            <h3>Información de la cuenta</h3>
            <label>Correo electrónico: </label>
            <input required type="email" name="CorreoElectronico" placeholder="cuenta@algo.com">
            <label>Usuario:</label>
            <input required minlength="4" type="text" name="Usuario" placeholder="Usuario" id="bloque">
            <label>Contraseña:</label>
            <input required minlength="8" type="password" name="Contraseña" id="txtContraseña">
            <span id="ShowPassword" onclick="mostrarPassword()" class="fa fa-eye-slash icon"></span>
        </div>
        <hr>
        <div class="container" id="informacionPersonal">
            <h3>Información personal</h3>
            <input required type="text" onblur="upperCase()" name="Nombre" placeholder="Nombre(s)" id="datos">
            <input required type="text" onblur="upperCase1()" name="Apellidos" placeholder="Apellidos" id="datos1">
            <label>Telefono</label>
            <input required minlength="10" type="text" name="Telefono" placeholder="xxxxxxxxxx">
        </div>
        <button type="submit" class="btn">Crear cuenta</button>
        <a href="login.php" id="cuenta">Ya tengo una cuenta</a>
    </form>
</body>

<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("txtContraseña");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }

    $(document).ready(function() {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function() {
            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });

    function upperCase() {
        var x = document.getElementById("datos").value
        document.getElementById("datos").value = x.toUpperCase()
    }

    function upperCase1() {
        var y = document.getElementById("datos1").value
        document.getElementById("datos1").value = y.toUpperCase()
    }
</script>

</html>
