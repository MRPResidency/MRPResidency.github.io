<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Dashboard');
include('asset/header.php');

$sql = "SELECT * FROM add_bill";
$result = $conn->query($sql);
$totalbill = $result->num_rows;

$sql = "SELECT * FROM visitor_tb";
$result = $conn->query($sql);
$totalvisitor = $result->num_rows;


$sql = "SELECT * FROM complain_tb WHERE complain_status IS NULL ";
$result = $conn->query($sql);
$totalunresolved = $result->num_rows;

$st = 'In Progress';
$sql = "SELECT * FROM complain_tb WHERE complain_status = '$st' ";
$result = $conn->query($sql);
$totalinprogress = $result->num_rows;

$status = 'Resolved';
$sql = "SELECT * FROM complain_tb WHERE complain_status = '$status' ";
$result = $conn->query($sql);
$totalresolved = $result->num_rows;


?>
<!-- Start Dashboard content -->
<div class="dashboard-content shadow-lg p-4 mt-5 mx-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
<h4 class="text-center">Dashboard</h4>
    <div class="row text-center"> <!-- Start row -->
        <!-- Start 1st card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white r mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Total Bill</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalbill; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="managebill.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 1st card -->
        <!-- Start 2nd card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Total visitor</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalvisitor; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="visitor.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 2nd card -->
        <!-- Start 3rd card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Unresolved complain</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalunresolved; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="unresolved.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 3rd card -->
        <!-- Start 4th card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">In progess complain</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalinprogress; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="inprogress.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 4th card -->
        <!-- Start 5th card -->
        <div class="col-sm-4 mt-3">
          <div class="card text-white mb-3" style="max-width: 18rem; background-image: url('../images/card.jpg');">
            <div class="card-header">Resolved complain</div>
            <div class="card-body">
            <h4 class="card-title"><?php echo $totalresolved; ?></h4>
            <a class="btn text-white" style="border: 2px outset;" href="resolved.php">View</a>
            </div>
          </div>
        </div>
        <!-- End 5th card -->
    </div> <!-- End row -->
</div>
<!-- End Dashboard content -->
<?php
include('asset/footer.php');
?>