<?php
session_start();
if(isset($_SESSION['is_login'])) {
  $lEmail = $_SESSION['lemail'];
} else {
  echo "<script> location.href='userlogin.php' </script>";
}
define('TITLE', 'User Panel');
include('../dbConnection.php');
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo TITLE ?></title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header d-print-none">
                <h5>MOURYA RESIDENCY</h5>
                <strong>MR</strong>
            </div>

            <ul class="list-unstyled components d-print-none">
			
			    <li>
                    <a href="dashboard.php">
                        <i class="fas fa-clipboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
				
				<li>
                    <a href="viewbill.php">
                        <i class="fas fa-address-book"></i>
                        <span class="title">View Bill</span>
                    </a>
                </li>
                <li>
                    <a href="#complainSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-edit"></i>
                         <span class="title">Complain</span>
                    </a>
                    <ul class="collapse list-unstyled" id="complainSubmenu">
                        <li>
                            <a href="addcomplain.php">
							<i class="fas fa-plus-square"></i>
							<span class="title">Add Complain</span>
							</a>
                        </li>
						
                        <li>
                            <a href="managecomplain.php">
							<i class="fas fa-spinner"></i>
							<span class="title">Complain Status</span>
							</a>
                        </li>
                       </ul>
                </li>
                <li>
                    <a href="#noticeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-bullhorn"></i>
                         <span class="title">Notice</span>
                    </a>
                    <ul class="collapse list-unstyled" id="noticeSubmenu">
                        <li>
                            <a href="forallnotice.php">
							<i class="fas fa-plus-square"></i>
							<span class="title">For All</span>
							</a>
                        </li>
						
                        <li>
                            <a href="personalnotice.php">
							<i class="fas fa-spinner"></i>
							<span class="title">Personal</span>
							</a>
                        </li>
                       </ul>
                </li>
				         
            </ul>
            
        </nav>

        <!-- Page Content  -->
        <div id="content" >

            <nav class="navbar navbar-expand navbar-light bg-light" >
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h4 style="color: white">User</h4>
                    <div id="navbarSupportedContent" >
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="userprofile.php">
								<i class="fas fa-user icon"></i></a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">
								<i class="fas fa-sign-out-alt icon"></i></a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>
                <!-- Content -->
                <div class="dashboard-content shadow-lg p-4" style="background-image: url('../images/society.png');">
               <div class="row text-center shadow-lg">
               <img src="../images/society.png"  style="width: 100%;" alt="Not Found"> 		   
               </div> 
			</div> 
            <!-- Content -->
		</div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="js/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Font Awesome JS -->
	<script src="js/all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>
</body>

</html>