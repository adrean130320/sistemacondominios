<?php
include 'layoutAdmin.php';
 ?>


 <main id="main" class="main">
   <div class="pagetitle">
     <h1>Gestionar vivienda</h1>
   </div><!-- End Page Title -->
   <!-- Button trigger modal -->
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
        <form class="" action="index.html" method="post">

          

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
                   <th scope="col">#</th>
                   <th scope="col">Name</th>
                   <th scope="col">Position</th>
                   <th scope="col">Age</th>
                   <th scope="col">Start Date</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <th scope="row">1</th>
                   <td>Brandon Jacob</td>
                   <td>Designer</td>
                   <td>28</td>
                   <td>2016-05-25</td>
                 </tr>
                 <tr>
                   <th scope="row">2</th>
                   <td>Bridie Kessler</td>
                   <td>Developer</td>
                   <td>35</td>
                   <td>2014-12-05</td>
                 </tr>
                 <tr>
                   <th scope="row">3</th>
                   <td>Ashleigh Langosh</td>
                   <td>Finance</td>
                   <td>45</td>
                   <td>2011-08-12</td>
                 </tr>
                 <tr>
                   <th scope="row">4</th>
                   <td>Angus Grady</td>
                   <td>HR</td>
                   <td>34</td>
                   <td>2012-06-11</td>
                 </tr>
                 <tr>
                   <th scope="row">5</th>
                   <td>Raheem Lehner</td>
                   <td>Dynamic Division Officer</td>
                   <td>47</td>
                   <td>2011-04-19</td>
                 </tr>
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
