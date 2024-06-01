<?php
$servername = "localhost";
$username = "root";
$password = "Tim8";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$age = $_POST['age'];
$gender = $_POST['gender'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$goals = $_POST['goals'];
$conditions = $_POST['conditions'];

$sql = "INSERT INTO users (username, password, age, gender, weight, height, goals, conditions)
VALUES ('$user', '$pass', '$age', '$gender', '$weight', '$height', '$goals', '$conditions')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
