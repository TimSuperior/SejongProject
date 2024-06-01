<?php
$servername = "localhost";
$username = "root";
$password = "Tim8";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = 1; // Example user ID
$sql = "SELECT * FROM progress WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Date: " . $row["date"]. " - Weight: " . $row["weight"]. "kg - Body Fat: " . $row["body_fat"]. "%<br>";
    }
} else {
    echo "No progress data found.";
}

$conn->close();
?>
