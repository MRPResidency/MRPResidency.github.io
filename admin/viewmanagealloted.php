<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'View Allot Flat');
include('asset/header.php');
?>

<!-- Start view -->
<div class="mx-4 mt-5 mb-5">
  <h3 class="text-center">Alloted User</h3>
  <?php 
    if(isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM signup_tb WHERE request_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
          </tr>
          <tr>
            <td>Date and Time</td>
            <td><?php if(isset($row['s_date'])){echo $row['s_date'];} ?></td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php if(isset($row['s_name'])){echo $row['s_name'];} ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php if(isset($row['s_email'])){echo $row['s_email'];} ?></td>
          </tr>
          <tr>
            <td>Contact</td>
            <td><?php if(isset($row['s_contact'])){echo $row['s_contact'];} ?></td>
          </tr>
          <tr>
            <td>Who Lives</td>
            <td><?php if(isset($row['s_who_lives'])){echo $row['s_who_lives'];} ?></td>
          </tr>
          <tr>
            <td>Alternate Address</td>
            <td><?php if(isset($row['s_alternate_add'])){echo $row['s_alternate_add'];} ?></td>
          </tr>
          <tr>
            <td>Wing</td>
            <td><?php if(isset($row['s_wing'])){echo $row['s_wing'];} ?></td>
          </tr>
          <tr>
            <td>Flat Type</td>
            <td><?php if(isset($row['s_flat_type'])){echo $row['s_flat_type'];} ?></td>
          </tr>
          <tr>
            <td>Flat Number</td>
            <td><?php if(isset($row['s_flat_number'])){echo $row['s_flat_number'];} ?></td>
          </tr>
          <tr>
            <td>Flat Area</td>
            <td><?php if(isset($row['s_flat_area'])){echo $row['s_flat_area'];} ?></td>
          </tr>
          <tr>
            <td>Family Member</td>
            <td><?php if(isset($row['s_member'])){echo $row['s_member'];} ?></td>
          </tr>
          <tr>
            <td>Maintenance</td>
            <td><?php if(isset($row['s_maintenance'])){echo $row['s_maintenance'];} ?></td>
          </tr>
          
        </tbody>
      </table>
      <div class="text-center">
        <form action="managealloted.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="managealloted.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- End view -->

<?php 
include('asset/footer.php');
?>