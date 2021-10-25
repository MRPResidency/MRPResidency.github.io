<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}

define('TITLE', 'Add Complain');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

$lEmail = $_SESSION['lemail'];
//Add Complain start
if (isset($_REQUEST['submitcomplain'])) {
  // Checking for empty fields
  if(($_REQUEST['complainfor'] == "") || ($_REQUEST['complainmessage'] == "")) {
    // Display message if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
      // Assigning user values to variables
      $lEmail = $_SESSION['lemail'];
      $cinfo = $_REQUEST['complainfor'];
      $cmessage = $_REQUEST['complainmessage'];
      $file = $_FILES['cfile']['name'];
      // To get values Enter in database
      $sql = "INSERT INTO complain_tb(complain_email, complain_for, complain_message, input_file_path) VALUES('$lEmail', '$cinfo', '$cmessage', '$file')";
      //for connection
      if($conn->query($sql) == TRUE) {
        move_uploaded_file($_FILES['cfile']['tmp_name'], "Storedocs/".$_FILES['cfile']['name']);
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Complain Submitted Successfully</div>';
      } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Submit Your Complain</div>';
      }    
  }
}


?>


<?php if(isset($msg)) {echo $msg;} ?>
<div class="container shadow-lg p-4 mt-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <h4 class="text-center">Add Complain</h4>
  <form action="" class="row" method="POST" enctype="multipart/form-data">
    <div class="form-group col-md-6">
      <label for="inputemail" class="form-label">User Email</label>
      <input type="email" class="form-control" value="<?php echo $lEmail; ?>" id="inputemail" readonly>
    </div>
    <div class="form-group col-md-6">
        <label for="inputComplain" class="form-label">Complain For</label>
        <input type="text" class="form-control" name="complainfor" id="inputComplain" placeholder="Complain for">
    </div>
    <div class="form-group col-md-12">
      <label for="inputmessage" class="form-label">Message</label>
      <textarea class="form-control" id="inputmessage" name="complainmessage" placeholder="Enter message" cols="10" rows="5" maxlength="4000"></textarea>
    </div>
    <div class="form-group ml-3">
        <label for="cfile">File Input</label>
        <small>( If Any )</small>
        <input type="file" class="form-control-file" name="cfile" id="cfile">
    </div>
    <div class="col-12 text-center">
    <button type="submit" class="btn btn-primary" name="submitcomplain">Send</button>
    </div>
  </form>

</div>
<?php
include('asset/footer.php');
?>