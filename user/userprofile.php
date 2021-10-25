<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}

define('TITLE', 'User Profile');
include('asset/header.php');

$sql = "SELECT * FROM signup_tb WHERE s_email = '$lEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $uName = $row['s_name'];
  $uPassword = $row['s_password'];
  $uContact = $row['s_contact'];
  $uWhoLives = $row['s_who_lives'];
  $uAlternate_add = $row['s_alternate_add'];
  $uWing = $row['s_wing'];
  $uFlatType = $row['s_flat_type'];
  $uFlatNumber = $row['s_flat_number'];
  $uFlatArea = $row['s_flat_area'];
  $uMember = $row['s_member'];
  $uMaintenance = $row['s_maintenance'];
}

if(isset($_REQUEST['updatebutton'])) {
  if(($_REQUEST['uPassword'] == "" )) {
    $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-warning mt-2 mb-2" role="alert">Please fill all Required Field</div>';
  } else {
    $uPassword = md5($_REQUEST['uPassword']);
    $sql = "UPDATE signup_tb SET s_password = '$uPassword' WHERE s_email = '$lEmail'";
    if($conn->query($sql) == TRUE) {
      $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-success mt-2 mb-2" role="alert">Updated Succesfully</div>';
    } else {
      $msg = '<div class="col-sm-6 ml-5 mt-2 alert alert-success mt-2 mb-2" role="alert">Unable to update</div>';
    }
  }
}

?>

  <?php if(isset($msg)) {echo $msg;} ?>
<div class="col-md-12 col-sm-10" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <form action="#" class="row shadow-lg p-4 g-3 mx-2 mt-5" method="POST">
    <h2 class="text-center mb-3 col-md-12" style="font-size:25px;">Profile Details</h2>
      <div class="form-group col-md-6">
        <label for="inputName">Full Name</label>
        <input type="text" class="form-control" value="<?php echo $uName ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label for="inputemail">Email ID</label>
        <input type="email" class="form-control" value="<?php echo $_SESSION['lemail'] ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="uPassword">Password</label>
        <input type="text" class="form-control" placeholder="Enter Password" name="uPassword" id="uPassword" value="<?php echo $uPassword ?>"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>

      <div class="form-group col-md-6">
        <label class="form-label">Contact Number</label>
        <input type="number" class="form-control" value="<?php echo $uContact ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label class="form-label">Who lives</label>
        <input type="text" class="form-control" value="<?php echo $uWhoLives ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label>Alternate Address</label>
        <input type="text" class="form-control" value="<?php echo $uAlternate_add ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label>Wing</label>
        <input type="text" class="form-control" value="<?php echo $uWing ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputType">Flat Type</label>
        <input type="text" class="form-control" value="<?php echo $uFlatType ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputNumber">Flat Number</label>
        <input type="number" class="form-control" value="<?php echo $uFlatNumber ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputNumber">Flat Area</label>
        <input type="text" class="form-control" value="<?php echo $uFlatArea ?>" readonly>
      </div>

      <div class="form-group col-md-4">
        <label class="form-label" for="inputNumber">Family Member</label>
        <input type="text" class="form-control" value="<?php echo $uMember ?>" readonly>
      </div>

      <div class="form-group col-md-6">
        <label class="form-label" for="inputNumber">Amount of Maintenance</label>
        <input type="number" class="form-control" value="<?php echo $uMaintenance ?>" readonly>
      </div>

      <div class="d-grid mt-2 text-center col-md-12">
        <button class="btn btn-danger" type="submit" name="updatebutton">Update</button>
      </div>
    
  </form>
</div>

<?php
include('asset/footer.php');
?>