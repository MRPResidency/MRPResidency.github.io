<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'Dashboard');
include('asset/header.php');

$sql = "SELECT * FROM add_bill WHERE b_email= '".$_SESSION['lemail']."' ";
$result = $conn->query($sql);
$totalbill = $result->num_rows;

$sql = "SELECT * FROM complain_tb WHERE complain_email= '".$_SESSION['lemail']."' ";
$result = $conn->query($sql);
$totalcomplain = $result->num_rows;

$sql = "SELECT * FROM notice_for_all_tb";
$result = $conn->query($sql);
$totalforall = $result->num_rows;

$sql = "SELECT * FROM notice_personal_tb WHERE no_email= '".$_SESSION['lemail']."' ";
$result = $conn->query($sql);
$totalpersonal = $result->num_rows;

?>
<!-- Start Dashboard content -->
<div class="dashboard-content shadow-lg p-4 mt-5 mx-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">>
<h4 class="text-center">Dashboard</h4>
<div class="row text-center"> <!-- Start row -->
        <!-- Start 1st card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem;background-image: url('../images/card.jpg');">
            <div class="card-header">Total Bill</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalbill; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="viewbill.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 1st card -->
        <!-- Start 2nd card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Total Complain</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalcomplain; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="managecomplain.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 2nd card -->
        <!-- Start 3rd card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">For All Notice</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalforall; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="forallnotice.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 4rd card -->
        <!-- Start 3rd card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Personal Notice</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalpersonal; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="personalnotice.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 4rd card -->
    </div> <!-- End row -->
</div>
<!-- End Dashboard content -->
<?php
include('asset/footer.php');
?>