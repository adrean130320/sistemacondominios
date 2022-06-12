<?php
include 'layoutAdmin.php';
include '../controladores/ViviendaControlador.php';
$vivienda=new ViviendaControlador();
$informacion= $vivienda->listarResidentes();
array_pop($informacion);
?>
<!DOCTYPE html>
<html lang="en">
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Informacion</h1>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">direccion</th>
                  <th scope="col">valor</th>
                  <th scope="col">propietario</th>
                  <th scope="col">residentes</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($informacion as $key) {
                ?>
                <tr>
                  <th scope="row"> <?php echo $key->direccion ?> </th>
                  <td> <?php echo $key->costo_mensual ?> </td>
                  <td> <?php echo $key->propietario ?> </td>
                  <td> <?php echo $key->residentes ?> <a href="informacionResidentes.php?vivienda=<?php echo $key->id ?>">(ver mas)</a> </td>
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

</main><!-- End #main -->

<!-- ======= Footer ======= -->


<!-- Vendor JS Files -->
<?php
include 'footer.php'
?>
</body>

</html>