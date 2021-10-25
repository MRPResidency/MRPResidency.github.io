<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Manage Notice For All');
include('asset/header.php');

?>

<!-- Start view -->
<div class="mx-4 mt-5 mb-5">
  <h3 class="text-center">For All Message</h3>
  <?php 
    if(isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM notice_for_all_tb WHERE request_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><?php if(isset($row['a_message'])){echo $row['a_message'];} ?></td>
          </tr>
          <tr>
            <td>Date and Time</td>
            <td><?php if(isset($row['a_date'])){echo $row['a_date'];} ?></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <form action="manageforall.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="manageforall.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- End view -->

<?php 
include('asset/footer.php');
?>