<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "societydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else{
	header('Location: visitorlanding.php');
}

if (isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$city = $_POST['city'];
	$description = $_POST['description'];
    $verify = $_POST['OTPs'];

	$query = "INSERT INTO visitor_tb(name, email, mobile, city, description, OTPs) VALUES ('$name', '$email', '$mobile', '$city', '$description', '$verify')";

	if(mysqli_query($conn, $query)){
		echo "";
	} else{
		echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
	}
} else{
	header('Location: visitorlanding.php');
}
mysqli_close($conn);