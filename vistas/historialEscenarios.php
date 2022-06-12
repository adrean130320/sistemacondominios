<?php
include 'layoutAdmin.php';
include '../controladores/AlquilerControlador.php';
$alquiler = new AlquilerControlador();
$reservaciones = $alquiler->listar();
array_pop($reservaciones);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Historial de reservaciones</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Escenario</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($reservaciones as $key) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"> <?php echo $key->nombre ?> </th>
                                        <td> <?php echo $key->nombres ?> </td>
                                        <td> <?php echo $key->fecha ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
include 'footer.php';
?>