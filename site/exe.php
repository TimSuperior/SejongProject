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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = htmlspecialchars(trim($_POST['comment']));
    $username = $_SESSION['username']; // Assuming the user is logged in and username is stored in session

    $sql = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $comment);

    $comment_message = "";
    if ($sql->execute() === TRUE) {
        $comment_message = "Comment submitted successfully!";
    } else {
        $comment_message = "Error: " . $sql->error;
    }

    $sql->close();
}

// Fetch comments from the database
$sql = "SELECT username, comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html class="wow-animation" lang="en">
  <head>
    <title>About Coach</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,700,700italic">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <!-- IE Panel-->
    <div class="page-loader page-loader-variant-1">
      <div><img width='300' height='130' src='images/logo1.png' alt=''/>
        <div class="offset-top-41 text-center">
          <div class="spinner"></div>
        </div>
      </div>
    </div>
    <!-- Page-->
    <div class="page text-center"><a class="section section-banner text-center d-none d-xl-block" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" style="background-image: url(images/banner/background-04-1920x60.jpg); background-image: -webkit-image-set( url(images/banner/background-04-1920x60.jpg) 1x, url(images/banner/background-04-3840x120.jpg) 2x )"></a>
      <!-- Page Head-->
      <header class="page-head slider-menu-position" data-preset='{"title":"Header with breadcrumbs","category":"header, breadcrumbs","reload":true,"id":"header-2"}'>
        <!-- RD Navbar Transparent-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar container rd-navbar-floated rd-navbar-dark" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">

              <!-- RD Navbar Panel -->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Top Panel Toggle-->
                <button class="rd-navbar-top-panel-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-top-panel"><span></span></button>
                <!--Navbar Brand-->
                <div class="rd-navbar-brand"><a href="index1.html"><img width='230' height='50' src='images/logo1.png' alt=''/></a></div>
              </div>
              <div class="rd-navbar-menu-wrap">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-mobile-scroll">
                    <!--Navbar Brand Mobile-->
                    <div class="rd-navbar-mobile-brand"><a href="index1.html"><img width='300' height='50' src='images/logo1.png' alt=''/></a></div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      
                      <li><a href="index1.html"><span>Home</span></a></li>
                      <li class="active"><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/exe.php"><span>Exercise</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/exesample.html"><span>Myprogress</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/nutri.php"><span>Nutrition</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/edit.php"><span>Edit Profile</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/login.html"><span>LogOut</span></a></li>
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
        <div class="context-dark">
          <!-- Modern Breadcrumbs-->
          <section>
            <div class="parallax-container breadcrumb-modern bg-gray-darkest" data-parallax-img="images/picexe.jpg">
              <div class="parallax-content"> 
                <div class="container section-top-98 section-bottom-34 section-lg-bottom-66 section-lg-98 section-xl-top-110 section-xl-bottom-41">
                  <h2 class="d-none d-lg-block offset-top-30"><span class="big">Exercises</span></h2>
                  <ul class="list-inline list-inline-dashed">
                    <li class="list-inline-item"><a href="index1.html">Home</a></li>
                    <li class="list-inline-item">Exercise
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
        </div>
      </header>
      <!-- About-->
      <section class="section-98 section-md-110 novi-background" data-preset='{"title":"Content block 2","category":"content","reload":true,"id":"content-block-2"}'>
        <div class="container">
          <div class="row justify-content-sm-center">
            <div class="col-sm-10 col-md-5">
              <!-- Member block type 5-->
              <div id="dis2" class="member-block-type-5 inset-lg-right-20">
              <?php 
if($_SESSION['fitness_lvl'] == 'beginner')
{
  echo <<<html
  <video class="img-fluid mx-auto d-block"width="450" height="450" controls>
                <source src="images/vid1.mp4" type="video/mp4">

              Your browser does not support the video tag.
              </video>
html;

}
elseif($_SESSION['fitness_lvl'] == 'intermediate')
{
  echo <<<html
  <video class="img-fluid mx-auto d-block"width="450" height="450" controls>
                <source src="images/vid2.mp4" type="video/ogg">
              Your browser does not support the video tag.
              </video>
html;

}
else
{
  echo <<<html
  <video class="img-fluid mx-auto d-block"width="450" height="450" controls>
                <source src="images/vid3.mp4" type="video/ogg">
              Your browser does not support the video tag.
              </video>
html;

}
?>

<div style="font-family: Arial, sans-serif; max-width: 400px;margin-top: 150px; margin: 20 auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

<h2 style="text-align: center; color: #333; font-size: 24px; margin-bottom: 20px;">Submit Your Weight</h2>

<form action="submit_weight.php" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
    <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
        <label for="weight" style="font-size: 16px; color: #555;">Weight (kg):</label>
        <input 
            type="text" 
            id="weight" 
            name="weight" 
            required 
            style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 8px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); outline: none; transition: border-color 0.3s;"
            onfocus="this.style.borderColor='#007bff';"
            onblur="this.style.borderColor='#ddd';"
        >
    </div>
    <div class="form-group" style="display: flex; justify-content: center;">
        <button 
            type="submit" 
            style="padding: 12px 20px; font-size: 16px; color: white; background-color: #28a745; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;"
            onmouseover="this.style.backgroundColor='#218838';"
            onmouseout="this.style.backgroundColor='#28a745';"
        >
            Submit
        </button>
    </div>
</form>
</div>


              </div>
            </div>
            <div class="col-sm-10 col-md-7 text-md-left">
              <div>
              <?php 
if($_SESSION['fitness_lvl'] == 'beginner')
{
  echo '<h1 class="text-darker" id="dis1">Beginner level</h1>';

}
elseif($_SESSION['fitness_lvl'] == 'intermediate')
{
  echo '<h1 class="text-darker" id="dis2">Intermediate level</h1>';

}
else
{
  echo '<h1 class="text-darker" id="dis3">Advanced level</h1>';

}
?>
                
                
                
              </div>


              
              <p class="text-muted offset-top-4">Watch and repeat!</p>
              <hr class="divider bg-red hr-md-left-0">
              <p class="offset-top-50 text-left">Warm Up and Cool Down: Always start with a warm-up and end with a cool-down to prevent injuries and improve performance.

</p>
              <div class="offset-top-30 text-center">
                <p>
                  <q class="font-italic h3 text-regular">Consult a doctor before starting any new exercise regimen, especially if you have pre-existing health conditions.</q>
                </p>
              </div>
              <div class="offset-top-30">
                <p class="text-left">Avoid Overtraining: Ensure adequate rest and recovery to prevent burnout and injuries.</p>
              </div>
              <div class="offset-top-50">
              <div class="form-container">



              <div style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; max-width: 600px; margin: 0 auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

<h1 style="text-align: center; color: #333; font-size: 24px; margin-bottom: 20px;">🏋️ Exercise Recommendations Chat</h1>

<!-- Chat container -->
<div id="messages" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); font-size: 14px;"></div>

<!-- User input area -->
<div id="input-area" style="display: flex; justify-content: center; align-items: center;">
    <input 
        type="text" 
        id="input" 
        placeholder="Ask for exercises, e.g., 'abs'..." 
        style="flex: 1; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); outline: none; margin-right: 10px;"
    >
    <button 
        id="send" 
        style="padding: 12px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;"
    >
        Send
    </button>
</div>

<script>
    const messagesDiv = document.getElementById('messages');
    const inputField = document.getElementById('input');
    const sendButton = document.getElementById('send');

    // Function to add messages to the chat window
    function addMessage(content, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;

        // Check if the content is a GIF URL
        if (content.startsWith("GIF: ")) {
            const gifUrl = content.replace("GIF: ", ""); // Extract the URL
            const gifImage = document.createElement('img');
            gifImage.src = gifUrl;
            gifImage.alt = "Exercise GIF";
            gifImage.style.width = "100%";
            gifImage.style.maxWidth = "300px";
            gifImage.style.height = "auto";
            gifImage.style.borderRadius = "8px"; // Rounded corners
            gifImage.style.marginTop = "10px";
            gifImage.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.1)"; // Shadow effect
            messageDiv.appendChild(gifImage);
        } else {
            // Regular text content
            messageDiv.textContent = content;
            messageDiv.style.wordWrap = "break-word"; // Ensure long text doesn't overflow
        }

        // Apply styles for the messages
        if (type === 'user') {
            messageDiv.style.color = '#0056b3';
            messageDiv.style.textAlign = 'right';
            messageDiv.style.backgroundColor = '#e9f7fe';
            messageDiv.style.padding = '10px';
            messageDiv.style.borderRadius = '8px';
            messageDiv.style.margin = '5px 0';
        } else if (type === 'bot') {
            messageDiv.style.color = '#155724';
            messageDiv.style.textAlign = 'left';
            messageDiv.style.backgroundColor = '#e2f4e9';
            messageDiv.style.padding = '10px';
            messageDiv.style.borderRadius = '8px';
            messageDiv.style.margin = '5px 0';
        }

        // Append the message to the chat container
        messagesDiv.appendChild(messageDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight; // Auto-scroll to the bottom
    }

    // Define a mapping for common user queries to body parts in the API.
    const bodyPartMappings = {
        "arm": "upper arms",
        "arms": "upper arms",
        "leg": "upper legs",
        "legs": "upper legs",
        "abs": "waist",
        "back": "back",
        "chest": "chest",
        "shoulder": "shoulders",
        "shoulders": "shoulders"
    };

    // Fetch exercises based on the user query
    async function fetchExercises(query) {
        try {
            const bodyPart = query.toLowerCase() || query.toLowerCase();

            // Make an API call to get exercises
            const response = await fetch("https://exercisedb.p.rapidapi.com/exercises?limit=10&offset=0", {
                method: "GET",
                headers: {
                    "x-rapidapi-host": "exercisedb.p.rapidapi.com",
                    "x-rapidapi-key": "45c47615cemsh4ffadff54158aa9p148816jsn5174ad595035"
                }
            });

            const data = await response.json();

            // Return exercises that match the body part query
            return data.filter(exercise =>
                exercise.bodyPart.toLowerCase().includes(bodyPart)
            );
        } catch (error) {
            console.error("Error fetching exercises:", error);
            return [];
        }
    }

    // Function to handle the user's input and show results
    async function handleUserInput() {
        const query = inputField.value.trim().toLowerCase();
        if (query === "") return;

        // Display the user's query in the chat
        addMessage(`User: ${query}`, 'user');

        // Clear the input field
        inputField.value = '';

        // Fetch exercises for the given query
        const exercises = await fetchExercises(query);

        // If exercises are found, display them
        if (exercises.length > 0) {
            addMessage(`Bot: Here are some exercises for ${query}:`, 'bot');
            exercises.forEach(exercise => {
                addMessage(`${exercise.name}`, 'bot');
                addMessage(`Target: ${exercise.target}`, 'bot');
                addMessage(`GIF: ${exercise.gifUrl}`, 'bot');
            });
        } else {
            addMessage(`Bot: Sorry, I couldn't find any exercises for ${query}. Please try another query.`, 'bot');
        }
    }

    // Event listener for the send button
    sendButton.addEventListener('click', handleUserInput);

    // Event listener for the Enter key
    inputField.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            handleUserInput();
        }
    });
</script>

</div>






<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 100px ; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: #333; font-size: 24px; margin-bottom: 20px;">Add Comments</h2>
    
    <!-- Comment Form -->
    <div class="comment-form" style="margin-bottom: 30px;">
        <form action="exe.php" method="post" style="display: flex; flex-direction: column; gap: 15px;">
            <label for="comment" style="font-size: 16px; color: #555;">Your Comment:</label>
            <textarea 
                id="comment" 
                name="comment" 
                rows="4" 
                required 
                style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 8px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); outline: none; transition: border-color 0.3s;"
                onfocus="this.style.borderColor='#007bff';"
                onblur="this.style.borderColor='#ddd';"
            ></textarea>
            <button 
                type="submit" 
                style="padding: 12px 20px; font-size: 16px; color: white; background-color: #007bff; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='#0056b3';"
                onmouseout="this.style.backgroundColor='#007bff';"
            >
                Submit Comment
            </button>
        </form>
        <?php if (isset($comment_message)) echo "<p style='color: green; margin-top: 10px;'>$comment_message</p>"; ?>
    </div>

    <!-- Comments Section -->
    <div class="comments-section">
        <h3 style="text-align: center; color: #333; font-size: 20px; margin-bottom: 20px;">All Comments</h3>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="comment" style="margin-bottom: 15px; padding: 15px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">';
                echo '<div class="comment-header" style="font-weight: bold; font-size: 14px; color: #007bff; margin-bottom: 5px;">' . htmlspecialchars($row['username']) . ' - <span style="font-size: 12px; color: #666;">' . $row['created_at'] . '</span></div>';
                echo '<div class="comment-body" style="font-size: 14px; color: #333; line-height: 1.5;">' . htmlspecialchars($row['comment']) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="text-align: center; color: #555; font-size: 14px;">No comments yet.</p>';
        }
        ?>
    </div>
</div>

    </div>


              </div>
            </div>
          </div>
        </div>
      </section>
    
     
      <!-- Page Footer-->
      <footer class="section-relative section-top-66 section-bottom-34 page-footer bg-gray-base context-dark novi-background" data-preset='{"title":"Footer","category":"footer","reload":true,"id":"footer"}'>
        <div class="container">
          <div class="row justify-content-md-center text-xl-left">
            <div class="col-md-12">
              <div class="row justify-content-sm-center">

                <div class="col-sm-10 col-md-3 offset-top-66 order-md-1 offset-md-top-0 col-md-6 col-xl-3 order-xl-1">
                  <!-- Footer brand-->
                  <div class="footer-brand"><a href="index1.html"><img width='200' height='50' src='images/logo1.png' alt=''/></a></div>

                  <p class="text-darker offset-top-20">FitHub &copy; <span id="copyright-year"></span> .
                    Design&nbsp;by&nbsp;TimurAsraev(19012851)</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Java script-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

