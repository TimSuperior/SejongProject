<?php include('session.php'); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "Tim8";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fitness_level = $_POST['fitness_level'];
// Collect additional assessment data

$sql = "INSERT INTO assessments (user_id, fitness_level)
VALUES ((SELECT id FROM users WHERE username = 'example_user'), '$fitness_level')";

if ($conn->query($sql) === TRUE) {
    echo "Assessment submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
