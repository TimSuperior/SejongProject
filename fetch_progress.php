<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = 1; // Example user ID
$sql = "SELECT date, weight FROM progress WHERE user_id = $user_id";
$result = $conn->query($sql);

$dates = [];
$weights = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dates[] = $row["date"];
        $weights[] = $row["weight"];
    }
}

echo json_encode(["dates" => $dates, "weights" => $weights]);

$conn->close();
?>
