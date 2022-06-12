<?php
include 'layoutAdmin.php';

include '../controladores/UsuarioControlador.php';
$usuario = new UsuarioControlador();
$usuariosLista = $usuario->listar();
array_pop($usuariosLista);
include '../controladores/ViviendaControlador.php';
$viviendas = new ViviendaControlador();
$viviendaLista = $viviendas->listarAsignar();
array_pop($viviendaLista);
include '../controladores/DocumentoControlador.php';
$documento = new DocumentoControlador();
$documentoLista = $documento->listar();
array_pop($documentoLista);
include '../controladores/TipoUsuarioControlador.php';
$tipoUsuario = new TipoUsuarioControlador();
$tipoUsuarioLista = $tipoUsuario->listar();
array_pop($tipoUsuarioLista);
?>


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Gestionar Usuarios</h1>
  </div><!-- End Page Title -->
  <!-- Button trigger modal -->


  <?php if (isset($_COOKIE['eliminada'])) {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>Usuario eliminado con exito
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php

  }

  ?>
  <?php if (isset($_COOKIE['actualizada'])) {
  ?>
    <i class="bi bi-check-circle me-1"></i>Usuario actualizado con exito
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
      <i class="bi bi-check-circle me-1"></i>Usuario añadido con exito
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
          <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="../controladores/router.php?con=UsuarioControlador&&fun=insertar" method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class=" col-form-label">nombre</label>
              <div class="col-sm-12">
                <input name="nombre" required type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-form-label">apellido</label>
              <div class="col-sm-12">
                <input name="apellidos" required type="text" class="form-control" id="inputText">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDate" class="col-form-label">Fecha de nacimiento</label>
              <div class="col-sm-12">
                <input required name="fecha" type="date" class="form-control">
              </div>
            </div>


            <div class="row mb-3">
              <label for="inputEmail3" class=" col-form-label">email</label>
              <div class="col-sm-12">
                <input name="email" required type="email" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-form-label">contraseña</label>
              <div class="col-sm-12">
                <input name="contrasena" required type="password" class="form-control" id="inputText">
              </div>
            </div>

            <div class="row mb-3">
              <label class=" col-form-label">Documento</label>
              <div class="col-sm-12">
                <select required name="tipo" class="form-select" aria-label="Default select example">
                  <?php foreach ($documentoLista as $key) {
                    // code...
                  ?>
                    <option value="<?php echo $key->id ?>"> <?php echo $key->tipo_documento ?> </option>

                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-form-label">numero Documento</label>
              <div class="col-sm-12">
                <input name="documento" required type="text" class="form-control" id="inputText">
              </div>
            </div>
            <div class="row mb-3">
              <label class=" col-form-label">tipo usuario</label>
              <div class="col-sm-12">
                <select required name="tipoUsuario" class="form-select" aria-label="Default select example">
                  <?php foreach ($tipoUsuarioLista as $key) {
                    // code...
                  ?>
                    <option value="<?php echo $key->id ?>"> <?php echo $key->rol ?> </option>

                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class=" col-form-label">vivienda</label>
              <div class="col-sm-12">
                <select required name="vivienda" class="form-select" aria-label="Default select example">
                  <option value="''"> no asignar </option>
                  <?php foreach ($viviendaLista as $key) {

                  ?>
                    <option value='<?php echo $key->id ?>'> <?php echo $key->direccion ?> </option>
                  <?php
                  }
                  ?>
                </select>
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
                  <th scope="col">tipo documento</th>
                  <th scope="col">numero documento</th>
                  <th scope="col">nombres</th>
                  <th>fecha nacimiento</th>
                  <th>email</th>
                  <th>tipo usuario</th>
                  <th>Vivienda</th>
                  <th>Acciones</th>
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
                    <td> <?php echo $key->nombres ?> </td>
                    <td> <?php echo $key->fecha_nacimiento ?> </td>
                    <td> <?php echo $key->email ?> </td>
                    <td> <?php echo $key->rol ?> </td>
                    <td> <?php echo $key->direccion ?> </td>
                    <td>

                      <!-- Button trigger modal -->

                      <button type="button" class="btn btn-danger bi bi-trash" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo $i ?>">
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="eliminar<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form class="" action="../controladores/router.php?con=UsuarioControlador&&fun=eliminar" method="post">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <input type="hidden" name="id" value="<?php echo $key->numero_documento ?>">
                                <strong>Seguro desea eliminar el usuario <?php echo $key->numero_documento ?> </strong>
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