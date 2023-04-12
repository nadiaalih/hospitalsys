<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');

if(isset($_POST['submit'])){
  $Name=$_POST['Name'];
  $Age=$_POST['Age'];
  $Phone=$_POST['Phone'];
  $fieldID=$_POST['fieldID'];
$insert="INSERT INTO doctors VALUES (NULL,'$Name',$Age,$Phone,$fieldID)";
$insertStates = mysqli_query($connect,$insert);

if($insertStates){
  header("location:/proj1/Doctor/list.php");
  }
  else{ 
    echo"<script> alert ('some thing wrong')      </script>";
  
  }

}
// select all fields
$select= "SELECT * FROM field ";

$selectall=mysqli_query($connect,$select);
?>

 <?php
// if($_SESSION ['admin'] == "admin"){}
// else{
//   header("location:/proj1/Admin/notauth.php");
//  }
 ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Patient</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Patient</li>
          <li class="breadcrumb-item active">Add</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Patient</h5>

              <!-- General Form Elements -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Age</label>
                  <div class="col-sm-10">
                    <input type="number"name="Age" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number"  name="Phone"class="form-control">
                  </div>
                </div>
             
                <!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div> -->
             
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">field</label>
                  <div class="col-sm-10">
<select name="fieldID" >
  <?php foreach($selectall as $item){ ?>
<option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
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