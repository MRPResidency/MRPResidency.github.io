<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Add Notice Personal');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

//Add Bill start
if (isset($_REQUEST['persubmit'])) {
  // Checking for empty fields
  if(($_REQUEST['nwing'] == "") || ($_REQUEST['nflat_number'] == "") || ($_REQUEST['nemail'] == "") || ($_REQUEST['nmessage'] == "") ) {
    // Display message if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    // Is that email is already register or not?
    $sql = "SELECT * FROM signup_tb WHERE s_wing = '".$_REQUEST['nwing']."' AND s_flat_number = '".$_REQUEST['nflat_number']."' AND s_email = '".$_REQUEST['nemail']."' ";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
      // Assigning user values to variables
      $nwing = $_REQUEST['nwing'];
      $nflat_number = $_REQUEST['nflat_number'];
      $nemail = $_REQUEST['nemail'];
      $nmessage = $_REQUEST['nmessage'];
      // To get values Enter in database
      $sql = "INSERT INTO notice_personal_tb(no_wing, no_flat_number, no_email, no_message) VALUES('$nwing', '$nflat_number', '$nemail', '$nmessage')";
      if($conn->query($sql) == TRUE)  {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Notice Send Succesfully</div>';
      } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Send Notice</div>';
      }
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Invalid User</div>';
    }
  }
}
// Add Bill End


?>

<!-- Personal Start -->
 <?php if(isset($msg)) {echo $msg;} ?>
<div class="col-md-12 col-sm-10" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
<form class="row g-3 shadow-lg p-4 mx-5 mt-5">
<h4 class="col-12 text-center mb-4">Add Personal Notice</h4>
  <div class="from-group col-md-4">
        <label for="inputwing" class="form-label">Wing</label>
        <input type="text" class="form-control" name="nwing" id="inputwing" placeholder="Enter Wing">
  </div>
  <div class="from-group col-md-4">
        <label for="inputflatnumber" class="form-label">Flat Number</label>
        <input type="number" class="form-control" name="nflat_number" id="inputflatnumber" placeholder="Enter Flat Number">
  </div>
  <div class="from-group col-md-4">
        <label for="inputemail" class="form-label">Email</label>
        <input type="email" class="form-control" name="nemail" id="inputemail" placeholder="Enter Email pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"">
  </div>
  <div class="from-group col-12 mt-4">
        <label for="inputmessage" class="form-label">Message</label>
        <small>( Maximum 2000 words )</small>
        <textarea class="form-control" id="inputmessage" name="nmessage" placeholder="Enter message" cols="10" rows="5" maxlength="2000"></textarea>
  </div>

  <div class="from-group col-12 text-center">
    <button type="submit" class="btn btn-primary mt-5 mb-4" name="persubmit">Send</button>
  </div>

</form>
</div>
<!-- Personal End -->


<?php 
include('asset/footer.php');
?>