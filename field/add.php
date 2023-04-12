<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');

if(isset($_POST['submit'])){
$Name=$_POST['name'];
$insert="INSERT INTO field VALUES (NULL,'$Name')";
$insertStates = mysqli_query($connect,$insert);

if($insertStates){
  header("location:/proj1/field/list.php");
  }
  else{ 
    echo"<script> alert ('some thing wrong')</script>";
  
  }
$doctorID=$_POST=['Name'];
  $select= "SELECT doctors.Name FROM `doctors` as Dname";

  $selectall=mysqli_query($connect,$select);


}

?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Department</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Department</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New department</h5>

              <!-- General Form Elements -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control">
                  </div>
</div>
             
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">Doctor</label>
                  <div class="col-sm-10">
<select name="Name">
  <?php foreach($selectall as $item){ ?>
<option value="<?php echo $item['ID']?>"><?php echo $item['Dname']?></option>
<?php }?>
</select>             
     </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary mx-5">Submit</button>

               
              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      
      </div>
    </section>

  </main><!-- End #main -->





<?php
include('../shared/footer.php')
?>