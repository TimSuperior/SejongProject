<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$exercise = $_POST['exercise'];
$sets = $_POST['sets'];
$reps = $_POST['reps'];
$rest = $_POST['rest'];
$user_id = 1; // Example user ID

$sql = "INSERT INTO workout_logs (user_id, exercise, sets, reps, rest)
VALUES ('$user_id', '$exercise', '$sets', '$reps', '$rest')";

if ($conn->query($sql) === TRUE) {
    echo "Workout logged successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
