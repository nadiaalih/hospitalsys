<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');


$select="SELECT field.id,field.name as deparetment, doctors.Name as Dname FROM field JOIN doctors ON doctors.fieldID=field.id";

$selectall=mysqli_query($connect,$select);
// delete
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$delete = "DELETE FROM field WHERE id=$id
";
$deletestates = mysqli_query($connect,$delete);
if($deletestates){
    header("location:/proj1/field/list.php");
}
    else{ 
      echo"<script> alert ('some thing wrong')  </script>";
    
    }


}
?>


<main id="main" class="main">

<div class="pagetitle">
  <h1>Department list</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">field</a></li>
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
                <th >Doctors</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
            <?php   foreach($selectall as $items) { ?> 

                  <tr>
                    <th ><?php echo $items ['id']?></th>
                    <th ><?php echo $items ['deparetment']?></th>
                    <th ><?php echo $items ['Dname']?></th>
                    <td><a href="/proj1/field/list.php/?delete=<?php echo $items['id']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                    <td><a href="/proj1/fild/edit.php/?edit=<?php echo $items['id']?>"><i class="fa-solid fa-pen-to-square"></i></i></a></td>

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