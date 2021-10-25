<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'In Progress');
include('asset/header.php');

?>
<!-- In Progress section Start -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mx-5 mt-5 text-center">
  <?php
   if(isset($_REQUEST['allotflatsubmit'])) {
    $email = $_REQUEST['email'];
    $query = "SELECT * FROM complain_tb WHERE complain_email LIKE '%$email%' ";
   } else {
    $st = 'In Progress';
    $query = "SELECT * FROM complain_tb WHERE complain_status = '$st'";
    $email = "";
    }
  $result = mysqli_query($conn, $query);
  ?> 
   
    <form action="" class="row justify-content-end" method="POST">
    <div class="form-group col-md-4">
      <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value = "<?php echo $email ?>" placeholder="Enter Email ID">
    </div>
    <div>
      <button type="submit" class="btn btn-success" name="allotflatsubmit"><i class="fas fa-search"></i></button>
    </div>
  </form>


      <div class="table-responsive">
        <p class="bg-dark text-white p-2">In Progress Complains</p>
          <table class="col-md-12 table table-striped table-fixed">
            <thead>
              <tr>
                <th scope="col">Register ID</th>
                <th scope="col">Email</th> 
                <th scope="col">Complain For</th>
                <th scope="col">Date and Time</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>

              <?php while ($row = mysqli_fetch_object($result)) { ?>
                  <td><?php echo $row->request_id ?></td>
                  <td><?php echo $row->complain_email ?></td>
                  <td><?php echo $row->complain_for ?></td>
                  <td><?php echo $row->complain_date ?></td>
                  <td>

                    <form action="viewinprogress.php?cid=<?php echo htmlentities($row->request_id); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row->request_id ?>">
                      <button class="btn btn-info" name="view" value="View" type="submit"><i class="fas fa-eye"></i></button>
                    </form>

                  </td>
              </tr>
            <?php } ?>
          </tbody>          
        </table>
      </div> 
  </div>
</div>
<!-- In Progress section End -->
<?php
include('asset/footer.php');
?>