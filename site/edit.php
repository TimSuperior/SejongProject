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

// Get the current logged-in user's username
$current_user = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize user inputs
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $gender = htmlspecialchars(trim($_POST['gender']));
    $weight = filter_var($_POST['weight'], FILTER_VALIDATE_FLOAT);
    $height = filter_var($_POST['height'], FILTER_VALIDATE_FLOAT);
    $goals = htmlspecialchars(trim($_POST['goals']));
    $conditions = htmlspecialchars(trim($_POST['conditions']));

    $sql = $conn->prepare("UPDATE users SET age = ?, gender = ?, weight = ?, height = ?, goals = ?, conditions = ? WHERE username = ?");
    $sql->bind_param("isddsss", $age, $gender, $weight, $height, $goals, $conditions, $current_user);

    $update_message = "";
    if ($sql->execute() === TRUE) {
        $update_message = "Profile updated successfully!";
    } else {
        $update_message = "Error: " . $sql->error;
    }

    $sql->close();
} else {
    // Fetch the current user's data
    $sql = $conn->prepare("SELECT age, gender, weight, height, goals, conditions FROM users WHERE username = ?");
    $sql->bind_param("s", $current_user);
    $sql->execute();
    $sql->bind_result($age, $gender, $weight, $height, $goals, $conditions);
    $sql->fetch();
    $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile - FitHub</title>
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
        .form-container {
            display: flex;
            align-items: center;
        }
        .col {
            margin: 20px;
        }
        button {
            margin-top: 10px;
            background-color: rgb(43, 224, 15);
        }
        textarea, input[type="text"], input[type="number"], input[type="password"], select {
            width: 100%;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <h2>Edit Profile</h2>
        <form action="edit.php" method="post">
            <div class="form-container">
                <div class="col">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required><br>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male" <?php echo ($gender == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo ($gender == 'female') ? 'selected' : ''; ?>>Female</option>
                        <option value="other" <?php echo ($gender == 'other') ? 'selected' : ''; ?>>Other</option>
                    </select><br>
                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" step="0.1" value="<?php echo htmlspecialchars($weight); ?>" required><br>
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" step="0.1" value="<?php echo htmlspecialchars($height); ?>" required><br>
                </div>
                <div class="col" style="margin-left:40px; float:right;">
                    <label for="goals">Fitness Goals:</label>
                    <textarea id="goals" name="goals" required><?php echo htmlspecialchars($goals); ?></textarea><br>
                    <label for="conditions">Health Conditions:</label>
                    <textarea id="conditions" name="conditions"><?php echo htmlspecialchars($conditions); ?></textarea><br>
                </div>
            </div>
            <div style="clear:both;">&nbsp;</div>
            <button type="submit">Edit Complete</button>
        </form>
        <?php if (isset($update_message)) echo "<p>$update_message</p>"; ?>
        <button onclick="window.location.href='index1.html';">Back Main Page</button>
    </div>
</body>
</html>
