<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'View For All Notice');
include('asset/header.php');
?>

<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mt-5 text-center">
  <?php

  $sql = "SELECT * FROM notice_for_all_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      echo '<div class="table-responsive">';
        echo '<p class="bg-dark text-white p-2">View Notice for all</p>';
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

                    echo '<form action="viewusermanageforall.php" method="POST" class="d-inline mx-2">';
                      echo '<input type="hidden" name="id" value='.$row['request_id'].'>';
                      echo '<button class="btn btn-info" name="view" value="View" type="submit"><i class="fas fa-eye"></i></button>';
                    echo '</form>';

                  echo '</td>';
              echo '</tr>';
            }
          echo '</tbody>';          
        echo '</table>';
      echo '</div>';
    } else {
    echo 'There is no Notice yet';
    }
  ?>
  </div>
</div>

<?php
include('asset/footer.php');
?>