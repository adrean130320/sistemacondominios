<?php
session_start();
if (isset($_SESSION['nombres']) &&isset($_SESSION['rol'])&&$_SESSION['rol']==1 ) {
  $nombre = $_SESSION['nombres'];
} else {
  header('location:login.php');
}
?>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestion de condominios</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <span class="d-none d-lg-block">Gestion de condominios</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class=" d-md-block dropdown-toggle ps-2">

              <?php
              echo $nombre;
              ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php
              echo $nombre;
              ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="cambiarContrasena.php">
                <i class="bi bi-key-fill"></i>
                <span>Cambiar contrase??a</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../controladores/router.php?con=UsuarioControlador&&fun=cerrarSesion">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Salir</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-house-fill"></i><span>Viviendas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="historialCasas.php">
              <i class="bi bi-circle"></i><span>Informacion</span>
            </a>
          </li>
          <li>
            <a href="gestionarViviendas.php">
              <i class="bi bi-circle"></i><span>Gestionar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-plus-fill"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="gestionarUsuarios.php">
              <i class="bi bi-circle"></i><span>Gestionar usuarios</span>
            </a>
          </li>
          <li>
            <a href="sancionar.php">
              <i class="bi bi-circle"></i><span>Sancionar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-coin"></i><span>Facturas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="facturas.php">
              <i class="bi bi-circle"></i><span>Ver facturas</span>
            </a>
          </li>
          <li>
            <a href="enviarFacturas.php">
              <i class="bi bi-circle"></i><span>Enviar facturas</span>
            </a>
          </li>
          <li>
            <a href="historialFacturas.php">
              <i class="bi bi-circle"></i><span>historial</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shop-window"></i><span>Escenario</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="gestionarEscenario.php">
              <i class="bi bi-circle"></i><span>Gestionar Escenario</span>
            </a>
          </li>
          <li>
            <a href="historialEscenarios.php">
              <i class="bi bi-circle"></i><span>Historia escenario</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li>
        <a class="nav-link" href="gestionarSanciones.php">
          <i class="bi bi-exclamation-octagon-fill"></i><span>Gestinar sanciones</span>
        </a>
      </li>
    </ul>

  </aside>