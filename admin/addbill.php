<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Add Bill');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

//Add Bill start
if (isset($_REQUEST['billsubmit'])) {
  // Checking for empty fields
  if(($_REQUEST['billname'] == "") || ($_REQUEST['billemail'] == "") || ($_REQUEST['billcontact'] == "") || ($_REQUEST['billflat_type'] == "") || ($_REQUEST['billflat_number'] == "") || ($_REQUEST['billwing'] == "") || ($_REQUEST['amount1'] == "") || ($_REQUEST['amount2'] == "")) {
    // Display message if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    // Is that email is already register or not?
    $sql = "SELECT * FROM signup_tb WHERE s_name = '".$_REQUEST['billname']."' AND s_email = '".$_REQUEST['billemail']."' AND s_contact = '".$_REQUEST['billcontact']."' AND s_flat_type = '".$_REQUEST['billflat_type']."' AND s_flat_number = '".$_REQUEST['billflat_number']."' AND s_wing = '".$_REQUEST['billwing']."' ";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
      // Assigning user values to variables
      $billname = $_REQUEST['billname'];
      $billemail = $_REQUEST['billemail'];
      $billcontact = $_REQUEST['billcontact'];
      $billflat_type = $_REQUEST['billflat_type'];
      $billflat_number = $_REQUEST['billflat_number'];
      $billwing = $_REQUEST['billwing'];
      $amount1 = $_REQUEST['amount1'];
      $amount2 = $_REQUEST['amount2'];
      $total = $_REQUEST['txtResult'];
      // To get values Enter in database
      $sql = "INSERT INTO add_bill(b_name, b_email, b_contact, b_flat_type, b_flat_number, b_wing, b_maintenance, b_other_charge, b_total_charge) VALUES('$billname', '$billemail', '$billcontact', '$billflat_type', '$billflat_number', '$billwing', '$amount1', '$amount2', '$total')";
      if($conn->query($sql) == TRUE)  {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Bill Added Succesfully</div>';
      } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add Bill</div>';
      }
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Invalid User</div>';
    }
  }
}
// Add Bill End


?>
  <?php if(isset($msg)) {echo $msg;} ?>
<div class="col-md-12 col-sm-10">
<form class="row shadow-lg p-4 g-3 mx-5 mt-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
<h4 class="col-12 text-center">Add Bill</h4>
  <div class="form-group col-md-6">
    <label class="form-label">Name</label>
    <input type="text" placeholder="Enter Member Name" name="billname" class="form-control">
  </div>
  <div class="form-group col-md-6">
    <label class="form-label">Email ID</label>
    <input type="email" placeholder="Enter Email" name="billemail" class="form-control " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
  </div>
  <div class="form-group col-md-6">
    <label class="form-label" for="phone">Contact Number</label>
    <small>(Enter 10 digit Mobile Number)</small>
    <input type="text" class="form-control" placeholder="Enter contact number" name="billcontact" id="phone" pattern="[0-9]{10}">
  </div>
  <div class="form-group col-md-4">
    <label class="form-label" for="inputType">Flat Type</label>
    <select class="custom-select" name="billflat_type">
      <option selected>Choose...</option>
      <option value="1RL">1Rk</option>
      <option value="1BHK">1BHK</option>
      <option value="2BHK">2BHK</option>
      <option value="3BHK">3BHK</option>
      <option value="4BHK">4BHK</option>
      <option value="duplex">duplex</option>
    </select>
  </div>
  <div class="form-group col-md-2">
    <label for="inputflatnumber" class="form-label">Flat Number</label>
    <input type="number" class="form-control" id="inputflatnumber" name="billflat_number" placeholder="Enter flat number">
  </div>
  <div class="form-group col-md-2">
    <label for="inputwing" class="form-label">Wing</label>
    <input type="text" class="form-control" name="billwing" id="inputwing" placeholder="Enter wing">
  </div>
  <div class="form-group col-md-4">
    <label for="inputmaintenance" class="form-label">Maintenance Charge</label>
    <input type="number" class="form-control" id="inputmaintenance" name="amount1" onkeyup="sum()" value="" placeholder="Enter maintenance charge">
  </div>
  <div class="form-group col-md-4">
    <label for="inputother" class="form-label">Other Charge</label>
    <input type="number" class="form-control" id="inputother" name="amount2" onkeyup="sum()" value="" placeholder="Enter Other charge">
  </div>
  <div class="form-group col-md-4">
    <label class="form-label" for="txtResult">Total Maintenance Charge</label>
    <input type="text" class="form-control" id="txtResult" name="txtResult" value="" placeholder="Enter Total maintenance charge">
  </div>
  <div class="col-12 text-center mt-5">
  <button type="submit" class="btn btn-primary" name="billsubmit">Submit</button>
  </div>

  </div>
</form>    
</div>

<script type="text/javascript">
  function sum() {
      var txtFirstNo = document.getElementById('inputmaintenance').value;
      var txtSecondNo = document.getElementById('inputother').value;
      var result = parseInt(txtFirstNo) + parseInt(txtSecondNo);
      if (!isNaN(result)) {
        document.getElementById('txtResult').value = result;
      }
  }
</script>

<?php
include('asset/footer.php');
?>