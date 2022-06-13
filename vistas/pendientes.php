<?php
include 'layout.php';
include '../controladores/FacturaControlador.php';
$facturas = new FacturaControlador();
$facturaLista = $facturas->listar($_SESSION['id']);
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
                                    <th scope="col">motivo</th>
                                    <th scope="col">descripcion</th>
                                    <th>valor</th>
                                    <th>fecha</th>
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
                                        <td> <?php echo $key->motivo ?> </td>
                                        <td> <?php echo $key->descripcion ?> </td>
                                        <td> <?php echo $key->valor ?> </td>
                                        <td> <?php echo $key->fecha ?> </td>
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