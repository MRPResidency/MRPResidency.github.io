<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'View Resolved');
include('asset/header.php');

date_default_timezone_set('Asia/kolkata');
$currentTime = date('d-m-Y h:i:s A', time() );

?>

<!-- Start view -->
<div class="mx-4 mt-5 mb-5">
  <h3 class="text-center">View Complain Details</h3>
  <?php 
    if(isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM complain_tb WHERE request_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc(); ?>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
          </tr>
          <tr>
            <td>Complain Email</td>
            <td><?php if(isset($row['complain_email'])){echo $row['complain_email'];} ?></td>
          </tr>
          <tr>
            <td>Complain For</td>
            <td><?php if(isset($row['complain_for'])){echo $row['complain_for'];} ?></td>
          </tr>
          <tr>
            <td>Complain Date and Time</td>
            <td><?php if(isset($row['complain_date'])){echo $row['complain_date'];} ?></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><?php if(isset($row['complain_message'])){echo $row['complain_message'];} ?></td>
          </tr>
          <tr>
            <td>Document (If Any)</td>
            <td><?php 
                $cfile = $row['input_file_path'];
                if($cfile == "" || $cfile == "NULL") {
                    echo 'File Not Attached';
                } else {?>
                    <a href="../user/Storedocs/<?php echo htmlentities($row['input_file_path']);?>" target="_blank" class="btn btn-link">View File</a>
                <?php }?>
            </td>
          </tr>
          <tr>
            <td>Final Status</td>
            <td><?php if(isset($row['complain_status'])){echo $row['complain_status'];} ?></td>
          </tr>
          <tr>
            <td>Remark</td>
            <td><?php if(isset($row['com_remark'])){echo $row['com_remark'];} ?></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <form action="resolved.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="resolved.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- End view -->

<?php
include('asset/footer.php');
?>