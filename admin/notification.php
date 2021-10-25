<?php
session_start();
if(isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aemail'];
} else {
  echo "<script> location.href='adminlogin.php' </script>";
}
define('TITLE', 'Notification');
include('asset/header.php');
include('../dbConnection.php');
?>
<div class="xyz">
    <h2>This is Notification</h2>    
</div>
<?php
include('asset/footer.php');
?>