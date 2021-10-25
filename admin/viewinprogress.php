<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'View Un Resolved');
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
            <td>Action</td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#action">Take Action</button></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center">
        <form action="inprogress.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onclick="window.print()">
        </form>
        <form action="inprogress.php" class="mb-3 d-inline d-print-none">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>
      </div>
    <?php } ?>

</div>
<!-- End view -->

<?php 

if(isset($_REQUEST['com_update'])) {
  if(($_REQUEST['status'] == "") || ($_REQUEST['remark'] == "")) {
    // Display message if required field missing
    $errmsg = '<div class="alert alert-warning col-sm-12 ml-5 mt-2" role="alert">Please fill all Fields</div>';
  } else {
    $comnumber = $_GET['cid'];
    $status = $_REQUEST['status'];
    $remark = $_REQUEST['remark'];

    //Get Value in database
    $query = mysqli_query($conn,"INSERT INTO sendcomplainstatus_tb (com_number, sec_status, sec_remark) VALUES('$comnumber', '$status', '$remark')");
    
    //Update value in database
    $sql = mysqli_query($conn,"UPDATE complain_tb SET complain_status='$status', com_remark='$remark' WHERE request_id = '$comnumber' ");
    
    echo '<script>alert("Complain Updated Successfully");</script>';
  }
}
?>

<!-- modal  -->
<?php if(isset($errmsg)) {echo $errmsg;} ?>
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="action" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="actionTitle">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group col">
            <label class="form-label">Request ID</label>
            <input type="text" class="form-control" class="form-control" value="<?php echo htmlentities($_GET['cid']); ?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label for="inputStatus" class="form-label">Choose Status</label>
            <select class="custom-select" name="status" id="inputStatus">
              <option selected>Choose...</option>
              <option value="In Progress">In Progress</option>
              <option value="Resolved">Resolved</option>
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="inputmessage" class="form-label">Remark</label>
            <small class="text-muted">( Maximum 2000 words )</small>
            <textarea class="form-control" id="inputmessage" name="remark" placeholder="Enter Remark" cols="10" rows="5" maxlength="2000"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="com_update">Save changes</button>
        
      </div>
    </form>
    </div>
  </div>
</div>

<?php
include('asset/footer.php');
?>