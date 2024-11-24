<?php
session_start();  // Start the session to get user ID

// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = "Tim8"; // Update with your database password
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user ID from session (make sure the user is logged in)
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];  // Assuming user_id is stored in session

    // Query to sum the total calories for a specific user
    $sql = "SELECT SUM(calories) AS totalCalories FROM nutrition_guidance WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    // Check if prepare fails
    if ($stmt === false) {
        echo json_encode(["error" => "Error preparing SQL statement."]);
        exit();
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($totalCalories);
    $stmt->fetch();

    // If no calories are found, default to 0
    if ($totalCalories === null) {
        $totalCalories = 0;
    }

    // Close the statement
    $stmt->close();

    // Return the total calories as JSON
    echo json_encode(["totalCalories" => $totalCalories]);
} else {
    // Return an error message if user is not logged in
    echo json_encode(["error" => "User not logged in"]);
}

$conn->close();
?>
