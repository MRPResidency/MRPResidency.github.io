<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'Manage Complain');
include('asset/header.php');

?>
<!-- Complain Status Start -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mt-5 text-center">
    <div class="table-responsive">
    <p class="bg-dark text-white p-2">Complain Details & Status</p>
    <table class="col-md-12 table table-striped table-fixed">
        <thead>
            <tr>
                <th scope="col">Register ID</th>
                <th scope="col">Reg Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM complain_tb WHERE complain_email = '".$lEmail."' ");
            while($row = mysqli_fetch_array($query))
            {
        ?>
            <tr>
                <td><?php echo htmlentities($row['request_id']); ?></td>
                <td><?php echo  htmlentities($row['complain_date']); ?></td>
                <td>
                    <button type="button" class="btn btn-<?php if($row['complain_status'] == "") {
                        echo 'danger';
                    } else if($row['complain_status'] == "In Progress") {
                        echo 'warning';
                    } else {
                        echo 'success';
                    }
                    ?>"><?php
                    if($row['complain_status'] == "") {
                        echo 'Un Resolved';
                    } else {
                        echo $row['complain_status'];
                    }
                    ?></button>
                <td>
                    <form action="viewmanage.php?cid=<?php echo htmlentities($row['request_id']); ?>" method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
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
<!-- Complain Status End -->
<?php
include('asset/footer.php');
?>