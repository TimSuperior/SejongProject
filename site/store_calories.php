<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = "Tim8"; // Update with your database password
$dbname = "fithub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "User is not logged in."]);
    exit;
}

// Retrieve the user_id from the session
$userId = $_SESSION['user_id'];

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve calories and other data from POST
    if (empty($_POST['calories'])) {
        echo json_encode(["status" => "error", "message" => "Calories are required."]);
        exit;
    }

    $calories = floatval($_POST['calories']); // Ensure calories are treated as a float
    $meal = $_POST['meal'] ?? 'Consumed Food';  // Default to 'Consumed Food' if no meal is specified
    $protein = isset($_POST['protein']) ? floatval($_POST['protein']) : 0; // Default to 0 if not provided
    $carbs = isset($_POST['carbs']) ? floatval($_POST['carbs']) : 0; // Default to 0 if not provided
    $fat = isset($_POST['fat']) ? floatval($_POST['fat']) : 0; // Default to 0 if not provided

    // SQL query to insert calorie data
    $sql = "INSERT INTO nutrition_guidance (user_id, meal, calories, protein, carbs, fat)
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo json_encode(["status" => "error", "message" => "Failed to prepare the SQL statement."]);
        exit;
    }

    // Bind parameters: 'i' for integer (user_id), 's' for string (meal), and 'd' for double/float (calories, protein, carbs, fat)
    $stmt->bind_param("issddd", $userId, $meal, $calories, $protein, $carbs, $fat);

    // Execute the statement and return a response
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Calorie data saved."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save calorie data."]);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
