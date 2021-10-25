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

if(isset($_REQUEST['delete'])) {
    $deid = $_REQUEST['id'];
    $sql = "DELETE FROM visitor_tb WHERE Request_Id = $deid ";
    if($conn->query($sql) == TRUE) {
      echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
      echo 'Unable to delete Data';
    }
  }

?>
<!-- Visitor Manage Start -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mx-5 mt-5 text-center">
  
  <?php
  $sql = "SELECT * FROM visitor_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      echo '<div class="table-responsive">';
        echo '<p class="bg-dark text-white p-2">Visitor Details</p>';
          echo '<table class="col-md-12 table table-striped table-fixed">';
            echo '<thead>';
              echo '<tr>';
                echo '<th scope="col">Register ID</th>';
                echo '<th scope="col">Name</th> ';
                echo '<th scope="col">Email</th> ';
                echo '<th scope="col">Date and Time</th> ';
                echo '<th scope="col">Action</th> ';
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
              echo '<tr>';
                while ($row = $result->fetch_assoc()) {
                  echo '<td>'.$row['Request_Id'].'</td>';
                  echo '<td>'.$row['name'].'</td>';
                  echo '<td>'.$row['email'].'</td>';
                  echo '<td>'.$row['DT'].'</td>';
                  echo '<td>';

                    echo '<form action="viewvisitor.php" method="POST" class="d-inline mx-2">';
                      echo '<input type="hidden" name="id" value='.$row['Request_Id'].'>';
                      echo '<button class="btn btn-info" name="view" value="View" type="submit"><i class="fas fa-eye"></i></button>';
                    echo '</form>';

                    echo '<form action="" method="POST" class="d-inline">';
                      echo '<input type="hidden" name="id" value='.$row['Request_Id'].'>';
                      echo '<button class="btn btn-danger" name="delete" value="Delete" type="submit"><i class="fas fa-trash"></i></button>';
                    echo '</form>';
                  echo '</td>';
              echo '</tr>';
            }
          echo '</tbody>';          
        echo '</table>';
      echo '</div>';
    } else {
    echo 'No Visitor is there';
    }
  if(isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM visitor_tb WHERE Request_Id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE) {
      echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
      echo 'Unable to delete Data';
    }
  }
  ?>
  </div>
</div>
<!-- Visitor Manage End -->
<?php
include('asset/footer.php');
?>