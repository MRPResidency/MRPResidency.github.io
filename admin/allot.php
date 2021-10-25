<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Allot Flat');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

//Allotement start
if (isset($_REQUEST['sSignup'])) {
  // Checking for empty fields
  if(($_REQUEST['sname'] == "") || ($_REQUEST['semail'] == "") || ($_REQUEST['spassword'] == "") || ($_REQUEST['slives'] == "") || ($_REQUEST['salternateadd'] == "") || ($_REQUEST['swing'] == "") || ($_REQUEST['sflattype'] == "") || ($_REQUEST['sflatnumber'] == "") || ($_REQUEST['sflatarea'] == "") || ($_REQUEST['smember'] == "") || ($_REQUEST['smaintenance'] == "")) {
    // Display message if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    // Is that email is already register or not?
    $sql = "SELECT s_email FROM signup_tb WHERE s_email = '".$_REQUEST['semail']."'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">This Email ID is already Registered</div>';
    } else {
      // Assigning user values to variables
      $name = $_REQUEST['sname'];
      $email = $_REQUEST['semail'];
      $password = md5($_REQUEST['spassword']);
      $repassword = md5($_REQUEST['srepassword']);
      if($password == $repassword) {
        $mobile = $_REQUEST['smobile'];
        $lives = $_REQUEST['slives'];
        $alternate_add = $_REQUEST['salternateadd'];
        $wing = $_REQUEST['swing'];
        $flat_type = $_REQUEST['sflattype'];
        $flat_number = $_REQUEST['sflatnumber'];
        $flat_area = $_REQUEST['sflatarea'];
        $member = $_REQUEST['smember'];
        $maintenance = $_REQUEST['smaintenance'];
        // To get values Enter in database
        $sql = "INSERT INTO signup_tb(s_name, s_email, s_password, s_contact, s_who_lives, s_alternate_add, s_wing, s_flat_type, s_flat_number, s_flat_area, s_member, s_maintenance) VALUES('$name', '$email', '$password', '$mobile', '$lives', '$alternate_add', '$wing', '$flat_type', '$flat_number', '$flat_area', '$member', '$maintenance')";
        //for connection
        if($conn->query($sql) == TRUE) {
          $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Flat allowted successfully</div>';
        } else {
          $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to allot flat</div>';
        }
      } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Password do not match</div>';
      }    
    
    }
  }
}
// Allotement End

?>
  <?php if(isset($msg)) {echo $msg;} ?>
  <div class="container shadow-lg p-4 mt-5 mb-5"  style="background-image: url('../images/xyz.jpg'); opacity: 1;">
       
    <!-- Start Allotement -->
    <form action="" class="row mt-3 mb-3"   method="POST" enctype="multipart/form-data">
	 
          <h2 class="text-center col-md-12 mt-3 mb-3" style="font-size:25px;">Register Owner</h2>
          <div class="form-group col-md-6">
            <label class="form-label" for="inputName">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter Full name" name="sname" autofocus>
          </div><br>

          <div class="form-group col-md-6">
            <label class="form-label" for="inputemail">Email ID</label>
            <input type="email" class="form-control" placeholder="Enter Email ID" name="semail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          </div><br/>

          <div class="form-group col-md-6">
            <label class="form-label" for="inputPassword">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="spassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
			title="Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
          </div><br/>

          <div class="form-group col-md-6">
            <label class="form-label" for="reinputPassword">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Re-Enter Password" name="srepassword">
          </div><br/>

                <!-- <div class="form-group col-md-6">
                  <label class="form-label" for="phone">Contact Number</label>
                  <small>(Enter 10 digit Mobile Number)</small>
                  <input type="text" class="form-control" placeholder="Enter contact number" id="phone" name="">
                </div><br/>
                 -->
          <div class="form-group col-md-6">
			    <label for="mobile">Enter Mobile Number</label>
			    <input type="text" class="form-control mb-2" id="mob"  placeholder="Enter mobile" name="smobile">
			  </div><br/>
                  
          <div class="form-group col-md-4">
            <label class="form-label" for="inputType">Who Lives?</label>
            <select class="custom-select" name="slives">
              <option selected>Choose...</option>
              <option value="Owner">Owner</option>
              <option value="On_Rent">On Rent</option>
            </select>
          </div><br/>

          <div class="form-group col-md-12">
            <label class="form-label" for="inputName">Corresponding Address</label>
            <small>(If Any)</small>
            <input type="text" class="form-control" placeholder="Enter Corresponding Address" name="salternateadd">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Wing</label>
            <input type="text" class="form-control" placeholder="Enter Wing" name="swing">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputType">Flat Type</label>
            <select class="custom-select" name="sflattype">
              <option selected>Choose...</option>
              <option value="1RL">1Rk</option>
              <option value="1BHK">1BHK</option>
              <option value="2BHK">2BHK</option>
              <option value="3BHK">3BHK</option>
              <option value="4BHK">4BHK</option>
              <option value="duplex">duplex</option>
            </select>
          </div><br/>
                  

          <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Flat Number</label>
            <input type="number" class="form-control" placeholder="Enter flat number" name="sflatnumber">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label" for="inputNumber">Flat Area</label>
            <input type="text" class="form-control" placeholder="Enter flat Area" name="sflatarea">
          </div><br/>

          <div class="form-group col-md-4">
            <label class="form-label">Total member of family</label>
            <input type="number" class="form-control" placeholder="Enter Total member of family" name="smember">
          </div>

          <div class="form-group col-md-6">
            <label class="form-label" for="inputNumber">Amount of Maintenance</label>
            <input type="number" class="form-control" placeholder="Enter flat Maintenance" name="smaintenance">
          </div><br/>

          <div class="col-md-12 d-grid mt-2 text-center">
          <button class="btn btn-primary" type="submit" name="sSignup">Allot</button>
          </div>
          
    </form>
    <!-- End Allotement -->
  </div>
  
  

<?php
include('asset/footer.php');
?>