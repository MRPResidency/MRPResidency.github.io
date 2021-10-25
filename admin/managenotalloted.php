<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}

define('TITLE', 'Manage Not Alloted Flat');
include('asset/header.php');

if(isset($_REQUEST['delete'])) {
  $deid = $_REQUEST['id'];
  $sql = "DELETE FROM not_alloted WHERE request_id = $deid ";
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
    $query = "SELECT * FROM not_alloted WHERE n_wing LIKE '%$wing%' AND n_flat_number LIKE '%$flat_no%' ";
   } else {
    $query = "SELECT * FROM not_alloted";
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
        <p class="bg-dark text-white p-2">Manage Not Alloted Flats</p>
          <table class="col-md-12 table table-striped table-fixed">
            <thead>
              <tr>
                <th scope="col">Register ID</th>
                <th scope="col">Wing</th>
                <th scope="col">Flat Number</th>
                <th scope="col">Flat Type</th>
                <th scope="col">Flat Area</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php while ($row = mysqli_fetch_object($result)) { ?>
                  <td><?php echo $row->request_id ?></td>
                  <td><?php echo $row->n_wing ?></td>
                  <td><?php echo $row->n_flat_number ?></td>
                  <td><?php echo $row->n_flat_type ?></td>
                  <td><?php echo $row->n_flat_area ?></td>
                  <td>

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