<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Αποτυχημένη σύνδεση: " . $conn->connect_error);
}

//set cookie
setcookie("username", $_POST['username'] , time()+60*60);	   
setcookie("password", $_POST['password'], time()+60*60);

$username1=$_POST["username"];
$password1=$_POST["password"];

$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","webapp");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $username1 . "' and password = '". $password1."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
        $message = "Λάθος όνομα ή κωδικός!";
		echo $message;
		header("refresh:1;index.php");
	} else {
        $message = "Συνδεθήκατε με επιτυχία!";
		echo $message;
		header("refresh:0.5;home.html");
	}
}
$conn->close();
?>