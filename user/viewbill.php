<?php
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'View Bill');
include('asset/header.php');
?>
<!-- Start View Bill -->
<div class="mx-4 shadow-lg p-4 mt-5 mb-5" style="background-image: url('../images/xyz.jpg'); opacity: 1;">
  <div class="mt-5 text-center">
  <?php

  $sql = "SELECT * FROM add_bill WHERE b_email = '".$lEmail."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      echo '<div class="table-responsive">';
        echo '<p class="bg-dark text-white p-2">View Bills</p>';
          echo '<table class="col-md-12 table table-striped table-fixed">';
            echo '<thead>';
              echo '<tr>';
                echo '<th scope="col">Register ID</th>';
                echo '<th scope="col">User Name</th> ';
                echo '<th scope="col">User Email</th> ';
                echo '<th scope="col">Flat Number</th>';
                echo '<th scope="col">Wing</th>';
                echo '<th scope="col">Total Maintenance Charge</th>';
                echo '<th scope="col">Action</th>';
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
              echo '<tr>';
                while ($row = $result->fetch_assoc()) {
                  echo '<td>'.$row['request_id'].'</td>';
                  echo '<td>'.$row['b_name'].'</td>';
                  echo '<td>'.$row['b_email'].'</td>';
                  echo '<td>'.$row['b_flat_number'].'</td>';
                  echo '<td>'.$row['b_wing'].'</td>';
                  echo '<td>'.$row['b_total_charge'].'</td>';
                  echo '<td>';

                    echo '<form action="viewusermanagebill.php" method="POST" class="d-inline mx-2">';
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
    echo 'There is no Bill Yet';
    }
  ?>

  </div>
  </div>
<!-- End View Bill -->
<?php
include('asset/footer.php');
?>