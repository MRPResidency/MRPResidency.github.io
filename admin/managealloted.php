<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Manage Alloted Flat');
include('asset/header.php');

if(isset($_REQUEST['delete'])) {
  $deid = $_REQUEST['id'];
  $sql = "DELETE FROM signup_tb WHERE request_id = $deid ";
  if($conn->query($sql) == TRUE) {
    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
  } else {
    echo 'Unable to delete Data';
  }
}

?>


<!-- Alloted section Start -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mx-5 mt-5 text-center">
  <?php
   if(isset($_REQUEST['allotflatsubmit'])) {
    $wing = $_REQUEST['wing'];
    $flat_no = $_REQUEST['flat_no'];
    $query = "SELECT * FROM signup_tb WHERE s_wing LIKE '%$wing%' AND s_flat_number LIKE '%$flat_no%' ";
   } else {
    $query = "SELECT * FROM signup_tb";
    $wing = "";
    $flat_no = "";
    }
  $result = mysqli_query($conn, $query);
  ?> 
   
    <form action="" class="row justify-content-end" method="POST">
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="wing" value = "<?php echo $wing ?>" placeholder="Enter wing">
    </div>
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="flat_no" value = "<?php echo $flat_no ?>" placeholder="Enter flat no.">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="allotflatsubmit"><i class="fas fa-search"></i></button>
    </div>
  </form>


      <div class="table-responsive">
        <p class="bg-dark text-white p-2">Manage Alloted Flats</p>
          <table class="col-md-12 table table-striped table-fixed">
            <thead>
              <tr>
                <th scope="col">Register ID</th>
                <th scope="col">Email</th> 
                <th scope="col">Contact Number</th>
                <th scope="col">Wing</th>
                <th scope="col">Flat Number</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php while ($row = mysqli_fetch_object($result)) { ?>
                  <td><?php echo $row->request_id ?></td>
                  <td><?php echo $row->s_email ?></td>
                  <td><?php echo $row->s_contact ?></td>
                  <td><?php echo $row->s_wing ?></td>
                  <td><?php echo $row->s_flat_number ?></td>
                  <td>

                    <form action="viewmanagealloted.php" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row->request_id ?>">
                      <button class="btn btn-info" name="view" value="View" type="submit"><i class="fas fa-eye"></i></button>
                    </form>

                    <form action="editmanagealloted.php?cid=<?php echo htmlentities($row->request_id); ?>" method="POST" class="d-inline mx-2">
                      <input type="hidden" name="id" value="<?php echo $row->request_id ?>">
                      <button class="btn btn-warning" name="edit" value="Edit" type="submit"><i class="fas fa-pen-nib"></i></button>
                    </form>

                    <form action="" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row->request_id ?>">
                      <button class="btn btn-danger" name="delete" value="Delete" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
              </tr>
            <?php } ?>
          </tbody>          
        </table>
      </div> 
  </div>
</div>
<!-- Alloted section End -->

<?php 
include('asset/footer.php');
?>