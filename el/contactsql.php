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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO messages (username, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $_POST["message"]);
$stmt->execute();
echo "Ευχαριστούμε για το μήνυμά σας. Θα σας απαντήσουμε το συντομότερο δυνατόν.";
header("refresh:0.5;contact.html");
$stmt->close();
?>