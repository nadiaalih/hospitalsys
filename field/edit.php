<?php
ob_start();
include('../shared/header.php');
include('../shared/connectDB.php');


if(isset($_GET['edit'])){
$id=$_GET['edit'];
$selectone = "SELECT * FROM `doctors` WHERE ID=$id";

$selectonep=mysqli_query($connect,$selectone);
$row = mysqli_fetch_assoc($selectonep);
$Name=$row['Name'];
$Age=$row['Age'];
$Phone=$row['Phone'];

$fieldID=$row['fieldID'];

if(isset($_POST['Update'])){
    $Name=$_POST['Name'];
    $Age=$_POST['Age'];
    $Phone=$_POST['Phone'];
    $fieldID=$_POST['fieldID'];
    $Update="UPDATE doctors SET Name='$Name' , Age=$Age , Phone=$Phone ,fieldID=$fieldID WHERE ID=$id";
    $UpdateStates = mysqli_query($connect,$Update);
    if($UpdateStates){
        header("location:/proj1/Doctor/list.php");
        }
        else{ 
          echo"<script> alert ('some thing wrong')      </script>";
        
        }
    }   
}

// select all doctors
$select= "SELECT doctors.ID , doctors.name as Dname,field.name as Fname FROM doctors join field ON doctors.fieldID =field.id;
";
$selectall=mysqli_query($connect,$select);



?>





<main id="main" class="main">

    <div class="pagetitle">
      <h1>EDIT Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Doctors</li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update New Data</h5>

              <!-- General Form Elements -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Name" value="<?php echo$Name ?>"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Age</label>
                  <div class="col-sm-10">
                    <input type="number"name="Age" value="<?php echo$Age ?>"class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number"  name="Phone"value="<?php echo$Phone ?>" class="form-control">
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">fieldID</label>
                  <div class="col-sm-10">
<select name="fieldID" >
  <?php foreach($selectall as $item){ ?>
<option value="<?php echo $item['ID']?>"><?php echo $item['Fname']?></option>
<?php }?>
</select>             
     </div>
                </div>

                <button type="submit" name="Update" class="btn btn-primary mx-5">Update</button>

               
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