
<!DOCTYPE html>
<html lang="en">
<head>
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
                        <span class="title"> Dashboard</span>
                    </a>
                </li>
				<li>
                    <a href="#billSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-address-book"></i>
                         <span class="title"> Bill</span>
                    </a>
                    <ul class="collapse list-unstyled" id="billSubmenu">
                        <li>
                            <a href="addbill.php">
							<i class="fas fa-folder-plus"></i>
							<span class="title"> Add Bill</span>
							</a>
                        </li>
						
                        <li>
                            <a href="managebill.php">
							<i class="fas fa-tasks"></i>
							<span class="title"> Manage Bill</span>
							</a>
                        </li>
                       
                    </ul>
                </li>
				<li>
                    <a href="#flatsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-building"></i>
                         <span class="title"> flats</span>
                    </a>
                    <ul class="collapse list-unstyled" id="flatsSubmenu">
                        <li>
                            <a href="allot.php">
							<i class="fas fa-folder-plus"></i>
							<span class="title"> Add Allot</span>
							</a>
                        </li>

                        <li>
                            <a href="notallot.php">
							<i class="fas fa-plus-square"></i>
							<span class="title"> Add Not Alloted</span>
							</a>
                        </li>
						
                        <li>
                            <a href="managealloted.php">
							<i class="fas fa-house-user"></i>
							<span class="title"> Manage Alloted</span>
							</a>
                        </li>

                        <li>
                            <a href="managenotalloted.php">
							<i class="fas fa-home"></i>
							<span class="title"> Manage Not Alloted</span>
							</a>
                        </li>

                    </ul>
                </li>
				
				<li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-edit"></i>
                         <span class="title"> Complain</span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="unresolved.php">
							<i class="fas fa-plus-square"></i>
							<span class="title"> Un Resolved</span>
							</a>
                        </li>
						
                        <li>
                            <a href="inprogress.php">
							<i class="fas fa-spinner"></i>
							<span class="title"> In Progress</span>
							</a>
                        </li>
                
                        <li>
                            <a href="resolved.php">
							<i class="fas fa-check-circle"></i>
							<span class="title"> Resolved</span>
							</a>
                        </li>						
                    </ul>
                </li>
                <li>
                    <a href="#NoticeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-bullhorn"></i>
                         <span class="title"> Notice</span>
                    </a>
                    <ul class="collapse list-unstyled" id="NoticeSubmenu">
                        <li>
                            <a href="addforall.php">
							<i class="fas fa-folder-plus"></i>
							<span class="title"> Add For All</span>
							</a>
                        </li>

                        <li>
                            <a href="addpersonal.php">
							<i class="fas fa-user-plus"></i>
							<span class="title"> Add Personal</span>
							</a>
                        </li>
						
                        <li>
                            <a href="manageforall.php">
							<i class="fas fa-tasks"></i>
							<span class="title"> Manage For All</span>
							</a>
                        </li>

                        <li>
                            <a href="managepersonal.php">
							<i class="fas fa-book-reader"></i>
							<span class="title"> Manage Personal</span>
							</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="visitor.php">
                        <i class="fas fa-users"></i>
                        <span class="title"> Visitor</span>
                    </a>
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
                    <h4 style="color: white">Admin</h4>
                    <div id="navbarSupportedContent" >
                    
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="adminprofile.php">
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