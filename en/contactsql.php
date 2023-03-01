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
$stmt = $conn->prepare("INSERT INTO messages (username, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $_POST["message"]);
$stmt->execute();
echo "Thank you for your message. We will respond you as soon as posible.";
header("refresh:0.5;contact.html");
$stmt->close();
?>