<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Add Not Allot Flat');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

// Not Alloted Start
if (isset($_REQUEST['nSubmit'])) {
  // Checking for empty fields
  if(($_REQUEST['nwing'] == "") || ($_REQUEST['nflatnumber'] == "") || ($_REQUEST['nflattype'] == "") || ($_REQUEST['nflatarea'] == "")) {
    // Display message if required field missing
    $errmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    // Is that Flat is already register or not?
    $sql = "SELECT * FROM not_alloted WHERE n_wing = '".$_REQUEST['nwing']."' AND n_flat_number = '".$_REQUEST['nflatnumber']."' ";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
      $errmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">This Flat is already Registered</div>';
    } else {
      // Assigning user values to variables
      $Nwing = $_REQUEST['nwing'];
      $Nflatnumber = $_REQUEST['nflatnumber'];
      $Nflattype = $_REQUEST['nflattype'];
      $Nflatarea = $_REQUEST['nflatarea'];
        
        // To get values Enter in database
        $sql = "INSERT INTO not_alloted(n_wing, n_flat_number, n_flat_type, n_flat_area) VALUES('$Nwing', '$Nflatnumber', '$Nflattype', '$Nflatarea')";
        //for connection
        if($conn->query($sql) == TRUE) {
          $errmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Flat Register Succesfully</div>';
        } else {
          $errmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Register Flat</div>';
        }  
    }
  }
}

// Not Alloted End


?>

<!-- Not Alloted Start -->
<?php if(isset($errmsg)) {echo $errmsg;} ?>

<div class="container shadow-lg p-4 mt-5 mb-5"  style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <h3 class="text-center col-md-12 mt-5 mb-3" style="font-size:25px;">Not Alloted Flats</h3>
  <form action="" class="row mt-3 mb-3" method="POST" enctype="multipart/form-data">

        <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Wing</label>
            <input type="text" class="form-control" placeholder="Enter Wing" name="nwing">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Flat Number</label>
            <input type="number" class="form-control" placeholder="Enter flat number" name="nflatnumber">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputType">Flat Type</label>
            <select class="custom-select" name="nflattype">
              <option selected>Choose...</option>
              <option value="1RL">1Rk</option>
              <option value="1BHK">1BHK</option>
              <option value="2BHK">2BHK</option>
              <option value="3BHK">3BHK</option>
              <option value="duplex">duplex</option>
            </select>
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Flat Area</label>
            <input type="text" class="form-control" placeholder="Enter flat Area" name="nflatarea">
          </div><br/>

          <div class="col-md-12 d-grid mt-2 text-center">
          <button class="btn btn-primary" type="submit" name="nSubmit">Submit</button>
          </div>
          
  </form>
</div>
    <!-- Not Alloted End -->


<?php 
include('asset/footer.php');
?>