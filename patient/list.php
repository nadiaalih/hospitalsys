<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');



$select="SELECT pathient.id,pathient.Name as pname ,pathient.Age ,pathient.Phone ,pathient.Address ,pathient.Description,pathient.EnterDate,pathient.LeaveDate,doctors.Name as Dname FROM pathient JOIN doctors ON pathient.doctorID=doctors.ID;";
$selectall=mysqli_query($connect,$select);
// delete
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$delete = "DELETE  FROM pathient WHERE id =$id";
$deletestates = mysqli_query($connect,$delete);
if($deletestates){
    header("location:/proj1/patient/list.php");
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
      <li class="breadcrumb-item"><a href="index.html">patient</a></li>
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
                <th >Address</th>
                <th >Describtion</th>
                <th >EnterDate</th>
                <th >LeaveDate</th>
                <th >doctorname</th>
                <th colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>
            <?php   foreach($selectall as $items) { ?> 

                  <tr>
                    <th ><?php echo $items ['id']  ?></th>
                    <th ><?php echo $items ['pname']  ?></th>
                    <td><?php echo $items ['Age']  ?></td>
                    <td><?php echo $items ['Phone']  ?></td>
                    <td><?php echo $items ['Address']  ?></td>
                    <td><?php echo $items ['Description']  ?></td>
                    <td><?php echo $items ['EnterDate']  ?></td>
                    <td><?php echo $items ['LeaveDate']  ?></td>
                    <td><?php echo $items ['Dname']  ?></td>
                    <td><a href="/proj1/patient/list.php/?delete=<?php echo $items['id']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                    <td><a href="/proj1/patient/edit.php/?edit=<?php echo $items['id']?>"><i class="fa-solid fa-pen-to-square"></i></i></a></td>

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