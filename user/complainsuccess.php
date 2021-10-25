<?php 
define('TITLE', 'Success');
include('asset/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
$sql = "SELECT * FROM complain_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    echo "<div class='col-sm-6 ml-5 mt-5'>
    <table class='table table-bordered border-primary'>
     <tbody>
      <tr>
       <th>Request ID</th>
        <td>".$row['request_id']."</td>
      </tr> 
      <tr>
       <th>User Email</th>
        <td>".$row['complain_email']."</td>
      </tr> 
      <tr>
       <th>Complain For</th>
        <td>".$row['complain_for']."</td>
      </tr> 
      <tr>
       <th>Complain Date</th>
        <td>".$row['complain_date']."</td>
      </tr> 
      <tr>
       <th>Complain Message</th>
        <td>".$row['complain_message']."</td>
      </tr> 
      <tr>
       <th>File Attached</th>
        <td>".$row['input_file_path']."</td>
      </tr> 
      <tr>
       <td><form class='d-print-none d-inline mx-3'><input class='btn btn-danger d-inline' type='submit'
       value='Print' onClick='window.print()'></form>
       <form class='d-print-none d-inline'><input class='btn btn-info d-inline' type='button'
       value='Close' onClick='window.close()'></form></td>
      </tr>
     </tbody>
    </table>
    </div>
    ";
} else {
    echo "Failed";
}

?>


<?php
include('asset/footer.php');
?>