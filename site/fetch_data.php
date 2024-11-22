<?php
header("Access-Control-Allow-Origin: *");
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "Tim8";
$dbname = "fithub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    die("User not authenticated.");
}

$user = $_SESSION['username'];

// Prepare and execute the query
$sql = "SELECT weight FROM progress WHERE user_id = (SELECT id FROM users WHERE username = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row['weight'];
}

// Return the data as JSON
echo json_encode($data);


// Close the statement and connection
$stmt->close();
$conn->close();
?>
