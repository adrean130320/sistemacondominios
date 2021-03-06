<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Entrar</title>
  <!-- <link rel="stylesheet" href="css/iniciar.css"> -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <section>




    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <?php if (isset($_COOKIE['erroriniciarsesion'])) {
              ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>Datos incorrectos
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
              }
              setcookie('erroriniciarsesion', 'erroriniciarsesion', time() - 1, '/');
              ?>

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="img/logoufps.png" alt="">
                  <span class="d-none d-lg-block">Gestion de condominios</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">iniciar sesion</h5>
                    <p class="text-center small">ingresa cedula y contrase??a</p>
                  </div>

                  <form action="../controladores/router.php?con=UsuarioControlador&fun=iniciarSesion" method="post" class="row g-3 needs-validation">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">cedula</label>
                      <div class="input-group has-validation">
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contrase??a</label>
                      <input type="password" name="contrasena" class="form-control" id="yourPassword" required>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Ingresar</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"> <a href="recuperarContrase??a.php">Recuperar contrase??a</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <footer>
  </footer>
  <script src="../js/alertas.js"> </script>
</body>


</html>
<?php
@session_start();
@session_destroy();
?>