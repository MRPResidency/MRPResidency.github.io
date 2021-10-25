<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}

define('TITLE', 'Add Notice For All');
include('asset/header.php');


date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );


if(isset($_REQUEST['forsubmit'])) {
  //check for empty fields
  if(($_REQUEST['amessage'] == "")){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please Fill All Fields</div>';
  } else {
    $amessage = $_REQUEST['amessage'];

    // sql query
    $sql = "INSERT INTO notice_for_all_tb(a_message) VALUES('$amessage')";
    if($conn->query($sql) == TRUE) {
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Notice Submitted Successfully</div>';
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Submit Your Notice</div>';
    }
  }
}


?>


<!-- For All Start -->
  <?php if(isset($msg)) {echo $msg;} ?>
<div class="col-md-12 col-sm-10" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
<form class="row g-3 shadow-lg p-4 mx-5 mt-5">
<h4 class="col-12 text-center">Add Notice for all</h4>
  <div class="form-group col-12">
    <label for="inputmessage" class="form-label">Message</label>
    <small>( Maximum 2000 words )</small>
    <textarea class="form-control" id="inputmessage" name="amessage" placeholder="Enter message" cols="10" rows="5" maxlength="2000"></textarea>
  </div>

  <div class="form-group col-12 text-center">
    <button type="submit" class="btn btn-primary mt-5 mb-4" name="forsubmit">Send</button>
  </div>

</form> 
</div>
<!-- For All End -->





<?php
include('asset/footer.php');
?>