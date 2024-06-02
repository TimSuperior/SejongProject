<?php
// Database credentials
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

// Validate and sanitize the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['weight']) && is_numeric($_POST['weight'])) {
        
        $weight = floatval($_POST['weight']);
        
        $user = $_SESSION['username'];
        // Prepare and bind
        $sql = "INSERT INTO progress (user_id, weight)
        VALUES ((SELECT id FROM users WHERE username = '$user'), '$weight')";

        
if ($conn->query($sql) === TRUE) {
    
    echo "Weight is submitted!";
    header('Location: index.html');
exit;
    //echo '<button onclick="window.location.href=\'index.html\';">Return to Main Page</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<button onclick="window.location.href=\'index.html\';">Error!!! Return to Main Page</button>';
}
        
        // Close the statement and connection
        
    } else {
        echo "Invalid input. Please enter numeric values for user ID, weight, and body fat.";
    }
}

$conn->close();
?>
