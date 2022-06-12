<?php
include 'layout.php';
include '../controladores/AlquilerControlador.php';
$alquiler = new AlquilerControlador();
$alquilerList = $alquiler->listar($_SESSION['id']);
array_pop($alquilerList);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Historial de reservas</h1>
    </div><!-- End Page Title -->
    <!-- Button trigger modal -->
    <?php if (isset($_COOKIE['datosincompletos'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>Datos incorrectos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>
    <?php if (isset($_COOKIE['eliminada'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>reservacion eliminada con exito
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Escenario</th>
                                    <th scope="col">Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($alquilerList as $key) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"> <?php echo $key->nombre ?> </th>
                                        <td> <?php echo $key->fecha ?> </td>
                                        <?php if( date('Y-m-d')< $key->fecha ){ ?>
                                        <td>
                                            <button type="button" class="btn btn-danger bi bi-trash" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $i ?>">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="eliminar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" action="../controladores/router.php?con=AlquilerControlador&&fun=eliminar" method="post">
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
                                        <?php
                                        }else{  ?>

                                            <td></td>

                                        <?php    }
                                        
                                        ?>
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