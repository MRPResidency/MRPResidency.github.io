<?php 
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['lemail'])) {
        $sql = "SELECT s_email, s_password FROM signup_tb WHERE s_email = '".$_REQUEST['lemail']."' AND s_password  = '".md5($_REQUEST['lpassword'])."' limit 1 ";
        $result = $conn->query($sql);
        if($result->num_rows == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['lemail'] = $_REQUEST['lemail'];
            echo "<script> location.href = 'userpanel.php';</script>";
            exit;
        } else {
            $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
        }
    }
} else {
    echo "<script> location.href = 'userpanel.php';</script>";
}

if(isset($_REQUEST['log_update'])) {
  if(($_REQUEST['log_email'] == "") || ($_REQUEST['log_contact'] == "") || ($_REQUEST['log_password'] == "")) {
    // Display message if required field missing
    $errmsg = '<div class="alert alert-warning col-sm-12 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    $log_email = $_REQUEST['log_email'];
    $log_contact = $_REQUEST['log_contact'];
    $log_password = md5($_REQUEST['log_password']);

    $sql = "UPDATE signup_tb SET s_password = '$log_password' WHERE s_email = '$log_email' AND s_contact = '$log_contact' ";
    if($conn->query($sql) == TRUE) {
        $errmsg = '<div class="col-sm-6 ml-5 mt-2 alert alert-success mt-2 mb-2" role="alert">Updated Succesfully</div>';
      } else {
        $errmsg = '<div class="col-sm-6 ml-5 mt-2 alert alert-success mt-2 mb-2" role="alert">Unable to update</div>';
      }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrape CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Goggle Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <div class="text-center mt-5 mb-2" style="font-size:20px;">
        <i class="fas fa-city"></i><span> Society Management System</span>
    </div>
    <div class="container-fluid" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <h2 class="text-center mb-3" style="font-size:25px;">User Login</h2>
                    <div class="form-group">
                        <label for="email">Email ID</label><br><br>
                        <input type="email" class="form-control" placeholder="Enter Email ID" name="lemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required autofocus><br/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><br><br>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="lpassword"  required><br/>
						<input type='checkbox' id='toggle' value='0' onchange='togglePassword(this);'>&nbsp; <span id='toggleText'>Show</span></td>
                    </div>
                    <label class="checkbox">
                    
                        <a type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Forgot Password?</a>
               
                    </label>
                    <div class=" mt-3">
					 <a href="../index.php" type="button" class="btn btn-primary mx-3" >Go Back</a>
                    <button class="btn btn-primary" type="submit">Login</button>
					
                    </div>
                    <?php if(isset($msg)) {echo $msg;} ?>
                </form>

                <!-- Start of Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="" method="POST" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <small class="text-muted">Please enter the following details to change the password</small></br></br>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" class="form-control" placeholder="Enter Email ID" name="log_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required autofocus>
        </div><br>
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="text" class="form-control" placeholder="Enter Contact Number" name="log_contact" pattern="[0-9]{10}" required autofocus>
        </div><br>
        <div class="form-group">
            <label for="password">Enter New Password</label>
            <input type="password" class="form-control" name="log_password" id="pass" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			<input type='checkbox' id='toggle' value='0' onchange='togglePass(this);'>&nbsp; <span id='toggleText'>Show</span></td>
        </div>
		 
        <?php if(isset($errmsg)) {echo $errmsg;} ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" name="log_update">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal -->
            </div>
        </div>
    </div>
	
	
	
	
	
	<script type="text/javascript">
// Hide/Show for Login password ------------------------------------------------------------------------------->
 
 function togglePassword(el){
 
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("password").type = 'text';

   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("password").type = 'password';

   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }

 }
 
 $("#password").password('toggle');
 
 
// Hide/Show for Forget Password ------------------------------------------------------------------->
  
 function togglePass(el){
 
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("pass").type = 'text';

   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("pass").type = 'password';

   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }

 }
 
 $("#pass").pass('toggle');
 
 
 
 
</script>
	




<!-- JavaScript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/jquery-ui.min"></script>


</body>
</html>