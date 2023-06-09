<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../assets/css/nav.css">
<link rel="icon" href="../assets/img/Logo.png">

<?php
session_start();
if (isset($_SESSION['Usuario'])) {
    $usuario = $_SESSION['Usuario'];
}
?>

<script type="text/javascript">
  function confirmar() {
    if (confirm("¿Desea cerrar sesión?")) {
      alert("Sesión finalizada")
      window.location = 'cerrar.php'
    } else {
      exit();
    }
  }
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/Logo.png" alt="" width="120" height="90" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo "$usuario" ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="confirmar();" style="cursor: pointer;">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" action="busqueda.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="busqueda" name="busqueda">
            </form>
        </div>
    </div>
</nav>