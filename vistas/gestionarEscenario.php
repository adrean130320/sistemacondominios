<?php
include 'layoutAdmin.php';
include '../controladores/EscenarioControlador.php';
$escenarios = new EscenarioControlador();
$escenariosList = $escenarios->listar();
array_pop($escenariosList);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Gestionar escenarios</h1>
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


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Añadir
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir escenario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="../controladores/router.php?con=EscenarioControlador&&fun=insertar" method="post">
                        <div class="row mb-3">
                            <label for="inputEmail3" class=" col-form-label">nombre</label>
                            <div class="col-sm-12">
                                <input name="nombre" required type="text" class="form-control" id="inputText">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-form-label">Descripcion</label>
                            <div class="col-sm-12">
                                <input name="descripcion" type="text" class="form-control" id="inputText">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Canceral</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($escenariosList as $key) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"> <?php echo $key->nombre ?> </th>
                                        <td> <?php echo $key->descripcion ?> </td>
                                        <td>

                                            <button type="button" class="btn btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editar<?php echo $i ?>">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" action="../controladores/router.php?con=EscenarioControlador&&fun=actualizar" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar escenario</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <input type="hidden" name="id" value="<?php echo $key->id ?>">
                                                                <div class="row mb-3">
                                                                    <label for="inputEmail3" class="col-form-label">descripcion</label>
                                                                    <div class="col-sm-12">
                                                                        <input name="descripcion" value="<?php echo $key->descripcion ?>" required type="text" class="form-control" id="inputText">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Canceral</button>
                                                                <button type="submit" class="btn btn-warning">Guardar</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button trigger modal -->

                                            <button type="button" class="btn btn-danger bi bi-trash" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $i ?>">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="eliminar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" action="../controladores/router.php?con=EscenarioControlador&&fun=eliminar" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <input type="hidden" name="id" value="<?php echo $key->id ?>">
                                                                <strong>Seguro desea eliminar el escenario <?php echo $key->nombre ?> </strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Canceral</button>
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>


<?php
include 'footer.php';
?>