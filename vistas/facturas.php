<?php
include 'layoutAdmin.php';

include '../controladores/FacturaControlador.php';
$facturas = new FacturaControlador();
$facturaLista = $facturas->listar();
array_pop($facturaLista);
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Facturas</h1>
    </div><!-- End Page Title -->
    <section class="section">

        <?php if (isset($_COOKIE['actualizada'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>pago realizado con exito
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

        }

        ?>

        <?php if (isset($_COOKIE['datosincompletos'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>ha ocurrido un error. Por favor intenta mas tarde.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

        }

        ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#factura</th>
                                    <th scope="col">usuario</th>
                                    <th scope="col">motivo</th>
                                    <th scope="col">descripcion</th>
                                    <th>valor</th>
                                    <th>fecha</th>
                                    <th>pagar</th>
                                    <th>ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($facturaLista as $key) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td> <?php echo $key->id ?> </td>
                                        <th scope="row"> <?php echo $key->nombres ?> </th>
                                        <td> <?php echo $key->motivo ?> </td>
                                        <td> <?php echo $key->descripcion ?> </td>
                                        <td> <?php echo $key->valor ?> </td>
                                        <td> <?php echo $key->fecha ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-danger bi bi-cart-check" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $i ?>">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="eliminar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="" action="../controladores/router.php?con=FacturaControlador&&fun=pagar" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <input type="hidden" name="id" value="<?php echo $key->id ?>">
                                                                <strong>Seguro desea realizar el pago para la factura <?php echo $key->id ?> </strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Canceral</button>
                                                                <button type="submit" class="btn btn-success bi bi-check">Pagar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                        <td> <a href="../facturas/<?php echo $key->id . '.pdf' ?>"> <button class="btn btn-primary bi bi-eye"></button> </a>
                                            <a download="" href="../facturas/<?php echo $key->id . '.pdf' ?>"><button class="btn btn-warning bi bi-download"></button> </a>
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