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

$fitness_level = $_POST['fitness_level'];
$_SESSION['fitness_lvl'] = $_POST['fitness_level'];
$user = $_SESSION['username'];

$sql = "INSERT INTO assessments (user_id, fitness_level)
VALUES ((SELECT id FROM users WHERE username = '$user'), '$fitness_level')";

if ($conn->query($sql) === TRUE) {
    echo "<div class=\"center-container\">
            <h2>Assessment submitted!</h2>
            <button onclick=\"window.location.href='index.html';\">Return to Main Page</button>
          </div>";
    header('Location: index.html');
    exit;
} else {
    echo "<div class=\"center-container\">
            <h2>Error: " . $sql . "<br>" . $conn->error . "</h2>
            <button onclick=\"window.location.href='index.html';\">Error!!! Return to Main Page</button>
          </div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assessment Result - FitHub</title>
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
</body>
</html>
