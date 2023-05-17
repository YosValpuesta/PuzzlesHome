<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
      <img src="../assets/img/Logo.png" alt="LogoEmpresa" width="120" height="90">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../login/login.php"><i class="fa-solid fa-user"></i>Iniciar Sesión</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos en venta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../productos/rompecabezas.php">Rompecabezas</a></li>
            <li><a class="dropdown-item" href="../productos/accesorios.php">Accesorios</a></li>
            <li><a class="dropdown-item" href="../productos/3D.php">Rompecabezas 3D</a></li>
            <li><a class="dropdown-item" href="../productos/3DMetal.php">Rompecabezas 3D Metal</a></li>
            <li><a class="dropdown-item" href="../productos/infantil.php">Rompecabezas Infantil</a></li>
            <li><a class="dropdown-item" href="../productos/madera.php">Rompecabezas Madera</a></li>
            <li><a class="dropdown-item" href="../productos/panoramico.php">Rompecabezas Panorámico</a></li>
            <li><a class="dropdown-item" href="../productos/desafiantes.php">Rompecabezas Desafiantes</a></li>
            <li><a class="dropdown-item" href="../productos/terror.php">Rompecabezas Terror</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" action="../busqueda.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="busqueda" name="busqueda">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>