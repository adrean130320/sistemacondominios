<?php
include 'layoutAdmin.php';

include '../controladores/UsuarioControlador.php';
$usuario = new UsuarioControlador();
$usuariosLista = $usuario->listarResidentes($_GET['vivienda']);
array_pop($usuariosLista);
include '../controladores/DocumentoControlador.php';
$documento = new DocumentoControlador();
$documentoLista = $documento->listar();
array_pop($documentoLista);

?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Informacion de residente</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">tipo documento</th>
                                    <th scope="col">numero documento</th>
                                    <th scope="col">nombres</th>
                                    <th>fecha nacimiento</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($usuariosLista as $key) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"> <?php echo $key->tipo_documento ?> </th>
                                        <td> <?php echo $key->numero_documento ?> </td>
                                        <td> <?php echo $key->nombre.' '.$key->apellido ?> </td>
                                        <td> <?php echo $key->fecha_nacimiento ?> </td>
                                        <td> <?php echo $key->email ?> </td>
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