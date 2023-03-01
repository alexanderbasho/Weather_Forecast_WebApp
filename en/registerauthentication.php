<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username1, $password1, $email1);

// set parameters and execute
//product autonumber!
$username1 = $_POST["username"];
$password1 = $_POST["password"];
$email1= $_POST["email"];

$sql = "SELECT username,email FROM users";
$result = $conn->query($sql);
$row = $result->fetch_array();

if ($row["username"]==$username1) {
  echo "The user with the entered username already exists";
} 
else if ($row["email"]==$email1) {
  echo "The user with the entered email already exists";
} 
else 
{
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username1, $email1, $password1);
  $stmt->execute();
  echo "New User created successfully";
  header("refresh:2;index.php");
  $stmt->close();
}

$conn->close();
?>