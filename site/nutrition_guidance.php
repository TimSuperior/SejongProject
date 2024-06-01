<?php
$servername = "localhost";
$username = "root";
$password = "Tim8";
$dbname = "fithub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = 1; // Example user ID
$sql = "SELECT * FROM nutrition_guidance WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Meal: " . $row["meal"]. " - Calories: " . $row["calories"]. " - Protein: " . $row["protein"]. "g - Carbs: " . $row["carbs"]. "g - Fat: " . $row["fat"]. "g<br>";
    }
} else {
    echo "No nutritional guidance found.";
}

$conn->close();
?>
