<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrape CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- Goggle Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">




  <title>Society Management System</title>
</head>
<body>
    
<!-- Start Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Society Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end " id="myMenu">
      <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about_us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact_us">Contact Us</a>
          </li>
        </ul>
        <a class="btn btn-outline-info" style="color:#ff01bf;" href="visitorlanding.php" role="button">Visitor</a>
    </div>
  </div>
</nav>
<!-- End Navigation bar -->

<!-- Start Header carousel -->
<header class="page-header">
  <div class="container pt-3">
    <div class="row align-item-center justify-content-center">
      <div class="header-content col-md-6">
        <h2>Society Management System</h2>
        <p>Our goal is to provide you the best facility to manage your <strong>Society</strong><br>
        Let's start the journey to manage your soceity systems with Our <strong>Soceity Management System.</strong></p>
        <a class="btn btn-lg btn-success mx-2 my-2 my-sm-0" href="user/userlogin.php" role="button">User</a>
        <a class="btn btn-lg btn-success mx-2 my-2 my-sm-0" href="admin/adminlogin.php" role="button">Admin</a>
      </div>
      <div class="header-image col-md-6">
        <img src="images\work_together.svg" alt="work-image">
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,96L48,106.7C96,117,192,139,288,128C384,117,480,75,576,74.7C672,75,768,117,864,122.7C960,128,1056,96,1152,80C1248,64,1344,64,1392,64L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</header>
<!-- End Header carousel -->

<!-- Start About Us -->
<div id="about_us">
  <div class="container about-container">
    <div class="row">
      <div class="col-md-6 about-content">
        <h1>About Us</h1>
        <p>We are <strong>Soceity Management System.</strong> We aim to improve your soceity management with Our Software.
        For manageing day-to-day task with ease</p>
      </div>
      <div class="about-img col-md-6">
        <img src="images\team_spirit.svg" alt="team-img" width="500px" heigth="400px">
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3205fcef" fill-opacity="1" d="M0,0L48,26.7C96,53,192,107,288,128C384,149,480,139,576,112C672,85,768,43,864,64C960,85,1056,171,1152,176C1248,181,1344,107,1392,69.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</div>
<!-- End About Us -->

<!-- Start Contact Us -->
  <?php include('contact.php') ?>
<!-- End Contact Us -->


<!-- Start Footer -->
<div class="footer">
    <div class="row">
      <div class="col-md-4">
        <h3 style="color: #fff;">Mourya Residency</h3>
        <strong style="color: #fff;">Address:</strong>
        <p style="color: #fff;">Mourya residency, near by center point hotel, Purna, Bhiwandi, Maharashtra 421302</p>
     
      </div>
	  <div class="col-md-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d52162.25693600033!2d73.03992020018131!3d19.255699972913753!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7c5b68d8c673dc1!2sMourya%20Residency!5e0!3m2!1sen!2sin!4v1616941747507!5m2!1sen!2sin" width="300" height="80" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     
      </div>
	  
	<div class="col-md-4">   
     <div class="whatsapp mb-3 ">
			<a href="http://wa.me//919320777083? text=Hi,i visited your website and following are my requirements" target="_blank">
			<img src="images\whatsapp.png" class="wa" width="50px" height="50px" style=" border-radius: 50%;">		</a>
     </div>
   </div>
  
    </div>
	
  <footer>
    <div class="container-fluid container-footer text-center"><p>Copyright @2020 <a href="index.php">Soceity Management System</a> All rights reserved</p></div>
  </footer>
</div>
<!-- End Footer -->


<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>


</body>
</html>