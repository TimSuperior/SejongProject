
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
$_SESSION['$fitness_lvl'] = $_POST['fitness_level'];
$user = $_SESSION['username'];
// Collect additional assessment data

$sql = "INSERT INTO assessments (user_id, fitness_level)
VALUES ((SELECT id FROM users WHERE username = '$user'), '$fitness_level')";

if ($conn->query($sql) === TRUE) {
    
    echo "Assessment submitted!";
    header('Location: index.html');
exit;
    //echo '<button onclick="window.location.href=\'index.html\';">Return to Main Page</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<button onclick="window.location.href=\'index.html\';">Error!!! Return to Main Page</button>';
}

$conn->close();
?>
