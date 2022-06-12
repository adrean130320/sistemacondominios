<?php
include 'layout.php';
include '../controladores/EscenarioControlador.php';
$escenarios = new EscenarioControlador();
$escenariosLista = $escenarios->listar();
array_pop($escenariosLista);
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
                        <?php if (isset($_COOKIE['existe'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>Escenario no disponible para la fecha
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                        <?php if (isset($_COOKIE['creada'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>Reservacion realizada con exito
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Reservar escenario</h5>
                                </div>
                                <form action="../controladores/router.php?con=AlquilerControlador&fun=insertar" method="post" class="row g-3 needs-validation">
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Seleccione escenario</label>
                                        <div class="col-sm-12">
                                            <select required name="escenario" class="form-select" aria-label="Default select example">
                                                <?php foreach ($escenariosLista as $key) {
                                                    // code...
                                                ?>
                                                    <option value="<?php echo $key->id ?>"> <?php echo $key->nombre ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['id'] ?>">
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Seleccione fecha</label>
                                        <div class="col-sm-12">
                                            <input required name="fecha" type="date" class="form-control" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Reservar</button>
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