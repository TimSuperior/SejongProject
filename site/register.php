<?php
session_start();
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

$_SESSION['username'] = $_POST['username'];
$sql = "INSERT INTO users (username, password, age, gender, weight, height, goals, conditions)
VALUES ('$user', '$pass', '$age', '$gender', '$weight', '$height', '$goals', '$conditions')";

$registration_message = "";
if ($conn->query($sql) === TRUE) {
    $registration_message = "Registration successful!";
} else {
    $registration_message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result - FitHub</title>
    <link rel="stylesheet" href="css/reg_styles.css">
    <style>
        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .center-container button {
            margin-top: 10px;
            background-color: rgb(43, 224, 15);
        }
    </style>
</head>
<body>
    <div class="center-container">
        <h2><?php echo $registration_message; ?></h2>
        <button onclick="window.location.href='assessment.html';">Go to assessment page</button>
    </div>
</body>
</html>
