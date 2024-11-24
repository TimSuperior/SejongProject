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
        echo "<div style=\"display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;\">
                <h2>Login successful! Welcome, " . $row['username'] . ".</h2>
                <button style=\"background-color: rgb(43, 224, 15); margin-top: 10px;\" onclick=\"window.location.href='http://localhost/Uni/WebProgProject/Sardorlol/site/index1.html';\">Return to Main Page</button>
              </div>";

        $row11 = $row['id'];
        $sql1 = "SELECT * FROM assessments WHERE user_id = $row11";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $_SESSION['fitness_lvl'] = $row1['fitness_level'];

    } else {
        echo "<div style=\"display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;\">
                <h2>Invalid password. Please try again.</h2>
                <button style=\"margin-top: 10px;\" onclick=\"window.location.href='http://localhost/Uni/WebProgProject/Sardorlol/site/login.html';\">Return to Login Page</button>
              </div>";
    }
} else {
    echo "<div style=\"display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;\">
            <h2>Invalid username. Please try again.</h2>
            <button style=\"margin-top: 10px;\" onclick=\"window.location.href='http://localhost/Uni/WebProgProject/Sardorlol/site/login.html';\">Return to Login Page</button>
          </div>";
}

$conn->close();
?>
