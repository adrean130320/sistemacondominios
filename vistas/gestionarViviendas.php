<?php
include 'layoutAdmin.php';
include '../controladores/ViviendaControlador.php';
$viviendas = new ViviendaControlador();
$viviendaLista = $viviendas->listar();
array_pop($viviendaLista);
?>


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Gestionar vivienda</h1>
  </div><!-- End Page Title -->
  <!-- Button trigger modal -->


  <?php if (isset($_COOKIE['actualizada'])) {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>Vivienda actualizada con exito
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
      <i class="bi bi-check-circle me-1"></i>Vivienda añadida con exito
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
          <h5 class="modal-title" id="exampleModalLabel">Añadir vivienda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="../controladores/router.php?con=ViviendaControlador&&fun=insertar" method="post">

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Direccion</label>
              <div class="col-sm-10">
                <input name="direccion" required type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Plantas</label>
              <div class="col-sm-10">
                <input name="plantas" required type="number" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Costo mensual</label>
              <div class="col-sm-10">
                <input name="costo" required type="number" class="form-control" id="inputText">
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
                  <th scope="col">Direccion</th>
                  <th scope="col">Plantas</th>
                  <th scope="col">Costo mensual</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($viviendaLista as $key) {
                  $i++;
                ?>
                  <tr>
                    <th scope="row"> <?php echo $key->direccion ?> </th>
                    <td> <?php echo $key->plantas ?> </td>
                    <td> <?php echo $key->costo_mensual ?> </td>
                    <td>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editar<?php echo $i ?>">
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="editar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form class="" action="../controladores/router.php?con=ViviendaControlador&&fun=actualizar" method="post">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar vivienda</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <input type="hidden" name="direccion" value="<?php echo $key->direccion ?>">
                                <div class="row mb-3">
                                  <label for="inputEmail3" class="col-form-label">Plantas</label>
                                  <div class="col-sm-12">
                                    <input name="plantas" value="<?php echo $key->plantas ?>" required type="number" class="form-control" id="inputText">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputEmail3" class=" col-form-label">Costo mensual</label>
                                  <div class="col-sm-12">
                                    <input value="<?php echo $key->costo_mensual ?>" name="costo" required type="number" class="form-control" id="inputText">
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