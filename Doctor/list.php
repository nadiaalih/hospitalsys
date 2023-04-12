<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');



$select="SELECT doctors.ID,doctors.Name as Dname ,doctors.Age ,doctors.Phone ,field.Name as fname FROM doctors JOIN field ON doctors.fieldID=field.id";
$selectall=mysqli_query($connect,$select);
// delete
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$delete = "DELETE FROM doctors WHERE ID=$id
";
$deletestates = mysqli_query($connect,$delete);
if($deletestates){
    header("location:/proj1/Doctor/list.php");
}
    else{ 
      echo"<script> alert ('some thing wrong')  </script>";
    
    }


}
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Patient list</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Doctors</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">list</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section mt-5">
  <div class="row">
    <div class="col-lg-12">

     

     

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Lists</h5>
          <!-- Active Table -->
          <table class="table">
            <thead>
              <tr>
              <th >ID</th>
                <th >Name</th>
                <th >Age</th>
                <th >Phone</th>
               
                <th >Department</th>
                <?php  if($_SESSION ['admin'] == "admin" ):  ?>

                <th colspan="2">Action</th>
<?php endif ?>
              </tr>
            </thead>
            <tbody>
            <?php   foreach($selectall as $items) { ?> 

                  <tr>
                    <th ><?php echo $items ['ID']  ?></th>
                    <th ><?php echo $items ['Dname']  ?></th>
                    <td><?php echo $items ['Age']  ?></td>
                    <td><?php echo $items ['Phone']  ?></td>
               
                    <td><?php echo $items ['fname']  ?></td>
                    <?php  if($_SESSION ['admin'] == "admin" ):  ?>

                    <td><a href="/proj1/Doctor/list.php/?delete=<?php echo $items['ID']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                    <?php endif ?>

                    <td><a href="/proj1/Doctor/edit.php/?edit=<?php echo $items['ID']?>"><i class="fa-solid fa-pen-to-square"></i></i></a></td>

                  </tr>
                  <?php } ?> 

</tbody>
          </table>
          <!-- End Active Table -->

        </div>
      </div>

     

    </div>

    
  </div>
</section>

</main><!-- End #main -->






<?php
include('../shared/footer.php')
?>