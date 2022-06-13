<?php
include 'layoutAdmin.php';
?>



<main id="main" class="main">
    <div class="pagetitle">
        <h1>Enviar facturas</h1>
    </div><!-- End Page Title -->
    <!-- Button trigger modal -->

    <?php if (isset($_COOKIE['eliminada'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>escenario eliminado con exito
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }

    ?>
    <?php if (isset($_COOKIE['actualizada'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>escenario actualizado con exito
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    }

    ?>

    <?php if (isset($_COOKIE['datosincompletos'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>Datos incorrectos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    }

    ?>
    <?php if (isset($_COOKIE['creada'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>escenario añadido con exito
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <section class="section">

        <div class="alert alert-danger alert-dismissible fade show" role="alert"> <i class="bi bi-exclamation-octagon me-1"></i> Por favor no recargue la pagina hasta tener una alerta.</div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert"> <i class="bi bi-exclamation-triangle me-1"></i> El envio de correos puede tomar varios minutos</div>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">El envio de facturas solo se podra realizar una vez al mes</h5>
                            </div>
                            <form action="../controladores/router.php?con=UsuarioControlador&fun=recuperarContrasena" method="post" class="row g-3 needs-validation">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
</main>



<?php
include 'footer.php';
?>