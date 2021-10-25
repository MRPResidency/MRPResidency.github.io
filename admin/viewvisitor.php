<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Visitor');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

?>

<!-- Visitor view start -->
<div class="mx-4 mt-5 mb-5">
  <h3 class="text-center">Visitor Details</h3>
  <?php 
    if(isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM visitor_tb WHERE Request_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['Request_Id'])){echo $row['Request_Id'];} ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php if(isset($row['name'])){echo $row['name'];} ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php if(isset($row['email'])){echo $row['email'];} ?></td>
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td><?php if(isset($row['mobile'])){echo $row['mobile'];} ?></td>
          </tr>
          <tr>
            <td>City</td>
            <td><?php if(isset($row['city'])){echo $row['city'];} ?></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><?php if(isset($row['description'])){echo $row['description'];} ?></td>
          </tr>
		  <tr>
            <td>Date & Time</td>
            <td><?php if(isset($row['DT'])){echo $row['DT'];} ?></td>
          </tr>
          <tr>
            
          
        </tbody>
      </table>
      <div class="text-center">
        <form action="visitor.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="visitor.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- Visitor view end -->

<?php
include('asset/footer.php');
?>