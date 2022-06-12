<?php
include 'layoutAdmin.php'
?>




<section>




    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <?php if (isset($_COOKIE['datosincompletos'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>Datos incorrectos
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                        <?php if (isset($_COOKIE['actualizada'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>contraseña actualizada con exito
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php

                        }

                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Cambiar contraseña</h5>
                                </div>

                                <form action="../controladores/router.php?con=UsuarioControlador&fun=cambiarContrasena" method="post" class="row g-3 needs-validation">

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">contraseña anterior</label>
                                        <div class="input-group has-validation">
                                            <input type="password" name="actual" class="form-control" id="yourUsername" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">nueva contraseña</label>
                                        <input type="password" name="nueva" class="form-control" id="yourPassword" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">repetir contraseña</label>
                                        <input type="password" name="nueva2" class="form-control" id="yourPassword" required>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Cambiar</button>
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








<?php
include 'footer.php';
?>