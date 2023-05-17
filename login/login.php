<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/Logo.png">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Inicio de sesión</title>
</head>

<body>
    <h1 id="titulo" class="text-center">PuzzlesHome</h1>
    <form action="./validar/iniciar.php" method="POST">
        <h1 class="text-center">Iniciar sesión</h1>
        <hr>
        <?php
        if (isset($_GET['error'])) {
        ?>
            <p class="error text-center">
                <?php
                echo $_GET['error']
                ?>
            </p>
        <?php
        }
        ?>
        <hr>
        <i class="fa-solid fa-user"></i>
        <label for="">Usuario</label>
        <input required type="text" name="Usuario" placeholder="Usuario">
        <i class="fa-solid fa-unlock"></i>
        <label for="">Contraseña</label>
        <input required type="password" name="Contraseña" placeholder="Contraseña" id="txtContraseña">
        <span id="ShowPassword" onclick="mostrarPassword()" class="fa fa-eye-slash icon"></span>
        <hr>
        <button type="submit" class="btn">Iniciar sesión</button>
        <a href="registro.php">Crear cuenta</a>
    </form>

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
    </script>

</body>

</html>