<?php
include 'layoutAdmin.php';

include '../controladores/FacturaControlador.php';
$facturas = new FacturaControlador();
$facturaLista = $facturas->listarPagos();
array_pop($facturaLista);
?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Facturas</h1>
    </div><!-- End Page Title -->
    <section class="section">

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
                                    <th>fecha de pago</th>
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

                                            <?php echo $key->fecha_pago ?> </td>
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