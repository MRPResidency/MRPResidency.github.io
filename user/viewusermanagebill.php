<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'View Bill');
include('asset/header.php');
?>

<!-- Start view -->
<div class="mx-4 mt-5 mb-5">
  <h3 class="text-center">Bill</h3>
  <?php 
    if(isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM add_bill WHERE request_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php if(isset($row['b_name'])){echo $row['b_name'];} ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php if(isset($row['b_email'])){echo $row['b_email'];} ?></td>
          </tr>
          <tr>
            <td>Contact</td>
            <td><?php if(isset($row['b_contact'])){echo $row['b_contact'];} ?></td>
          </tr>
          <tr>
            <td>Flat Type</td>
            <td><?php if(isset($row['b_flat_type'])){echo $row['b_flat_type'];} ?></td>
          </tr>
          <tr>
            <td>Flat Number</td>
            <td><?php if(isset($row['b_flat_number'])){echo $row['b_flat_number'];} ?></td>
          </tr>
          <tr>
            <td>Wing</td>
            <td><?php if(isset($row['b_wing'])){echo $row['b_wing'];} ?></td>
          </tr>
          <tr>
            <td>Date and Time</td>
            <td><?php if(isset($row['b_date'])){echo $row['b_date'];} ?></td>
          </tr>
          <tr>
            <td>Maintenance</td>
            <td><?php if(isset($row['b_maintenance'])){echo $row['b_maintenance'];} ?></td>
          </tr>
          <tr>
            <td>Other Charges</td>
            <td><?php if(isset($row['b_other_charge'])){echo $row['b_other_charge'];} ?></td>
          </tr>
          <tr>
            <td>Total Charges</td>
            <td><?php if(isset($row['b_total_charge'])){echo $row['b_total_charge'];} ?></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <form action="viewbill.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="viewbill.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- End view -->


<?php
include('asset/footer.php');
?>