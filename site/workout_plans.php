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
$sql = "SELECT * FROM workout_plans WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Exercise: " . $row["exercise"]. " - Sets: " . $row["sets"]. " - Reps: " . $row["reps"]. " - Rest: " . $row["rest"]. "<br>";
    }
} else {
    echo "No workout plans found.";
}

$conn->close();
?>
