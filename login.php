<?php
session_start();
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

$user = $_POST['username'];
$pass = $_POST['password'];

// Fetch user from database
$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        // Store user information in session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        echo "<h2>Login successful! Welcome, " . $row['username'] . ".</h2>";
        echo '<button onclick="window.location.href=\'index.html\';">Return to Main Page</button>';
    } else {
        echo "<h2>Invalid password. Please try again.</h2>";
        echo '<button onclick="window.location.href=\'login.html\';">Return to Login Page</button>';
    }
} else {
    echo "<h2>Invalid username. Please try again.</h2>";
    echo '<button onclick="window.location.href=\'login.html\';">Return to Login Page</button>';
}

$conn->close();
?>
