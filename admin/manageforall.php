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

<!-- Manage for all section Start -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mx-5 mt-5 text-center">
  
  <?php
  $sql = "SELECT * FROM notice_for_all_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      echo '<div class="table-responsive">';
        echo '<p class="bg-dark text-white p-2">Manage For All</p>';
          echo '<table class="col-md-12 table table-striped table-fixed">';
            echo '<thead>';
              echo '<tr>';
                echo '<th scope="col">Register ID</th>';
                echo '<th scope="col">Date</th> ';
                echo '<th scope="col">Action</th> ';
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
              echo '<tr>';
                while ($row = $result->fetch_assoc()) {
                  echo '<td>'.$row['request_id'].'</td>';
                  echo '<td>'.$row['a_date'].'</td>';
                  echo '<td>';

                    echo '<form action="viewmanageforall.php" method="POST" class="d-inline mx-2">';
                      echo '<input type="hidden" name="id" value='.$row['request_id'].'>';
                      echo '<button class="btn btn-info" name="view" value="View" type="submit"><i class="fas fa-eye"></i></button>';
                    echo '</form>';

                    echo '<form action="" method="POST" class="d-inline">';
                      echo '<input type="hidden" name="id" value='.$row['request_id'].'>';
                      echo '<button class="btn btn-danger" name="delete" value="Delete" type="submit"><i class="fas fa-trash"></i></button>';
                    echo '</form>';
                  echo '</td>';
              echo '</tr>';
            }
          echo '</tbody>';          
        echo '</table>';
      echo '</div>';
    } else {
    echo 'No Flat Found';
    }
  if(isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM notice_for_all_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE) {
      echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
    } else {
      echo 'Unable to delete Data';
    }
  }
  ?>
  </div>
</div>
<!-- Manage for all section End -->

<?php 
include('asset/footer.php');
?>