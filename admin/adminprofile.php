<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
$sql = "SELECT a_email, a_name, a_password FROM adminlogin_tb WHERE a_email = '$aEmail'";
$result = $conn->query($sql);
if($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $aName = $row['a_name'];
  $aPassword = $row['a_password'];
}


if(isset($_REQUEST['update'])) {
  if(($_REQUEST['aName'] == "") || ($_REQUEST['aPassword'] == "" )) {
    $msg = '<div class="alert alert-warning mt-2 mb-2" role="alert">Please fill all Fields</div>';
  } else {
    $aName =  $_REQUEST['aName'];
    $aPassword =  $_REQUEST['aPassword'];
    $sql = "UPDATE adminlogin_tb SET a_name = '$aName' , a_password = '$aPassword' WHERE a_email='$aEmail'";
    if($conn->query($sql) == TRUE) {
      $msg = '<div class="alert alert-success" style="position:absolute" role="alert">Updated Succesfully</div>';
    } else {
      $msg = '<div class="alert alert-danger" style="position:absolute" role="alert">Unable to update</div>';
    }
  }
}

define('TITLE', 'Admin Profile');
include('asset/header.php');
?>
<?php if(isset($msg)) {echo $msg;} ?>
<div class="container" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="col-md-12 col-sm-10 shadow-lg mt-5">
    <form action="" method="POST" class="mt-5">

      <div class="form-group">
        <label for="aEmail" class="mt-4">Email</label><input class="form-control" type="email" name="aEmail" id="aEmail" value="<?php echo $_SESSION['aemail'] ?>" readonly>
      </div>
      <div class="form-group">
        <label for="aName">Name</label><input class="form-control" type="text" name="aName" id="aName" value="<?php echo $aName ?>" >
      </div>
      <div class="form-group">
        <label for="aPassword">Password</label><input class="form-control" type="text" name="aPassword" id="aPassword" value="<?php echo $aPassword ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="col-12 text-center mt-5">
      <button type="submit" class="btn btn-danger mb-4" name="update">Update</button>
      </div>
      
    </form>
  </div>
</div>
<?php
include('asset/footer.php');
?>