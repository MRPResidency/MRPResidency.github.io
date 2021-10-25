<?php
include('../dbConnection.php');
session_start();
// error_reporting(0);
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Edit Allot Flat');
include('asset/header.php');

  if(isset($_REQUEST['updatebutton']))  {
    if(($_REQUEST['uName'] == "" ) || ($_REQUEST['uEmail'] == "" ) || ($_REQUEST['uPassword'] == "" ) || ($_REQUEST['uContact'] == "" ) || ($_REQUEST['uWhoLives'] == "" ) || ($_REQUEST['uAlternate_add'] == "" ) || ($_REQUEST['uWing'] == "" ) || ($_REQUEST['uFlatType'] == "" ) || ($_REQUEST['uFlatNumber'] == "" ) || ($_REQUEST['uFlatArea'] == "" ) || ($_REQUEST['uMember'] == "" ) || ($_REQUEST['uMaintenance'] == "" )) {
      $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-warning mt-2 mb-2" role="alert">Please fill all Required Field</div>';
    } else {
      $eid = $_REQUEST['u_id'];
      $uName = $_REQUEST['uName'];
      $uEmail = $_REQUEST['uEmail'];
      $uPassword = md5($_REQUEST['uPassword']);
      $uContact = $_REQUEST['uContact'];
      $uWhoLives = $_REQUEST['uWhoLives'];
      $uAlternate_add = $_REQUEST['uAlternate_add'];
      $uWing = $_REQUEST['uWing'];
      $uFlatType = $_REQUEST['uFlatType'];
      $uFlatNumber = $_REQUEST['uFlatNumber'];
      $uFlatArea = $_REQUEST['uFlatArea'];
      $uMember = $_REQUEST['uMember'];
      $uMaintenance = $_REQUEST['uMaintenance'];
    }
    $query = "UPDATE signup_tb SET s_name = '$uName', s_email = '$uEmail', s_password = '$uPassword', s_contact = '$uContact', s_who_lives = '$uWhoLives', s_alternate_add = '$uAlternate_add', s_wing = '$uWing', s_flat_type = '$uFlatType', s_flat_number = '$uFlatNumber', s_flat_area = '$uFlatArea', s_member = '$uMember',  s_maintenance = '$uMaintenance' WHERE request_id = '$eid' ";

    $query_rum = mysqli_query($conn,$query);
    if($query_rum) {
      $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-success mt-2 mb-2" role="alert">Updated Succesfully</div>';
    } else {
      $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-danger mt-2 mb-2" role="alert">Unable to update</div>';
    }
  }

?>


<div class="col-md-12 col-sm-10">
  <?php
   $sid = $_GET['cid'];
    $sql = "SELECT * FROM signup_tb WHERE request_id = '$sid' ";
    $query_rum = mysqli_query($conn,$sql);
    foreach($query_rum as $row) {
  ?>
<?php if(isset($msg)) {echo $msg;} ?>
  <form action="" class="row shadow-lg p-4 g-3 mx-5 mt-5" method="POST" enctype="multipart/form-data">
    <h2 class="text-center mb-3 col-md-12" style="font-size:25px;">User Details</h2>
      <div class="form-group col-md-6">
        <label>Requester ID</label>
        <input type="text" class="form-control" name="u_id" value="<?php echo $row['request_id']; ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label for="inputName">Full Name</label>
        <input type="text" class="form-control" placeholder="Enter Full Name" name="uName" value="<?php echo $row['s_name']; ?>" id="inputName">
      </div>

      <div class="form-group col-md-6">
        <label for="inputemail">Email ID</label>
        <input type="email" class="form-control" placeholder="Enter Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="uEmail" value="<?php echo $row['s_email']; ?>" id="inputemail">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="uPassword">Password</label>
        <input type="text" class="form-control" placeholder="Enter Password" name="uPassword" id="uPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $row['s_password']; ?>">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="inputcontact">Contact Number</label>
        <input type="number" class="form-control" placeholder="Enter Contact Number" name="uContact" value="<?php echo $row['s_contact']; ?>" id="inputcontact">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="wholives">Who lives</label>
        <input type="text" class="form-control" placeholder="Enter who lives" name="uWhoLives" value="<?php echo $row['s_who_lives']; ?>" id="wholives">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="alternate_add">Alternate Address</label>
        <input type="text" class="form-control" placeholder="Enter Address" name="uAlternate_add" value="<?php echo $row['s_alternate_add']; ?>" id="alternate_add">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="wing">Wing</label>
        <input type="text" class="form-control" placeholder="Enter Wing" name="uWing" value="<?php echo $row['s_wing']; ?>" id="wing">
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputFlatType">Flat Type</label>
        <input type="text" class="form-control" placeholder="Enter Flat Type" name="uFlatType" value="<?php echo $row['s_flat_type']; ?>" id="inputFlatType">
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputFlatNumber">Flat Number</label>
        <input type="number" class="form-control" placeholder="Enter Flat Number" name="uFlatNumber" value="<?php echo $row['s_flat_number']; ?>" id="inputFlatNumber">
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputFlatArea">Flat Area</label>
        <input type="text" class="form-control" placeholder="Enter Flat Area" name="uFlatArea" value="<?php echo $row['s_flat_area']; ?>" id="inputFlatArea">
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputFamilyMember">Family Member</label>
        <input type="text" class="form-control" placeholder="Enter Family Member" name="uMember" value="<?php echo $row['s_member']; ?>" id="inputFamilyMember">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="inputMaintenance">Amount of Maintenance</label>
        <input type="number" class="form-control" placeholder="Enter Maintenance" name="uMaintenance" value="<?php echo $row['s_maintenance']; ?>" id="inputMaintenance">
      </div>

      <div class="d-grid mt-2 text-center col-md-12">
        <button class="btn btn-danger" type="submit" name="updatebutton">Update</button>
        <a href="managealloted.php" class="btn btn-info">Cancel</a>
      </div>
      
  </form>
      <?php
      }
    ?>
</div>

<?php 
include('asset/footer.php');
?>