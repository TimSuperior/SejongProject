<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Get userId from session
} else {
    // Handle the case where the user is not logged in
    $userId = 0; // Or redirect to login page
}
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/exe.php"><span>Exercise</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/exesample.html"><span>Myprogress</span></a></li>
                      <li class="active"><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/nutri.php""><span>Nutrition</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/edit.php"><span>Edit Profile</span></a></li>
                      <li><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/logout.php"><span>LogOut</span></a></li>
                      
                      
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
            <div class="parallax-container breadcrumb-modern bg-gray-darkest" data-parallax-img="images/nutr.jpg">
              <div class="parallax-content"> 
                <div class="container section-top-98 section-bottom-34 section-lg-bottom-66 section-lg-98 section-xl-top-110 section-xl-bottom-41">
                  <h2 class="d-none d-lg-block offset-top-30"><span class="big">Nutrition Guidance (Comming Soon...)</span></h2>
                  <ul class="list-inline list-inline-dashed">
                    <li class="list-inline-item"><a href="index1.html">Home</a></li>
                    <li class="list-inline-item">Nutrition Guidance (Comming Soon...)
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
                  <img src="images/nut1.png" alt="Nutrition img" width="450" height="450">

              </div>

            </div>
            <div class="col-sm-10 col-md-7 text-md-left">
              <div>
                <h1 class="text-darker">Nutrition Guidance: </h1>
              </div>
              <p class="text-muted offset-top-4">Help with your diet</p>
              <hr class="divider bg-red hr-md-left-0">
              <!--<p class="offset-top-50 text-left">Progress often comes in small steps, and consistency is key to achieving long-term success.</p>-->
              <div class="offset-top-30 text-center">
                <p>
                  <q class="font-italic h3 text-regular">Healthy diet, healthy life.</q>
                </p>
              </div>
              <div class="offset-top-30">
                <p class="text-left">A balanced diet is crucial for maintaining overall health and well-being. It provides the necessary nutrients, vitamins, and minerals that the body needs to function effectively. A diet rich in fruits, vegetables, whole grains, lean proteins, and healthy fats can help reduce the risk of chronic diseases such as heart disease, diabetes, and cancer. Additionally, proper nutrition supports brain function, boosts the immune system, and aids in maintaining a healthy weight. Consistently making healthy dietary choices can lead to improved energy levels, better mental clarity, and enhanced quality of life.</p>
              </div>

              <!-- Chat Interface -->
<!-- Calorie Tracker Section -->
<div id="calorieStats" style="text-align: center; margin-bottom: 20px;">
  <h3 style="font-size: 2em; margin: 0;">0</h3>
  <p style="font-size: 1.2em; margin: 0;">Left: 2500</p>
</div>

<div class="chart-container" style="display: flex; justify-content: center; align-items: center; height: 300px; margin-bottom: 20px;">
  <canvas id="calorieChart" width="200" height="200" style="max-width: 100%; max-height: 100%;"></canvas>
</div>

<!-- Chat Section -->
<div id="chat" style="margin: 20px;">
  <div id="messages" style="max-height: 300px; overflow-y: auto; margin-bottom: 10px; border: 1px solid #ccc; padding: 10px;"></div>
  <div id="input-area" style="display: flex;">
      <input type="text" id="input" placeholder="Type your food or drink..." style="flex: 1; padding: 10px; margin-right: 10px;">
      <button id="send" style="padding: 10px 15px;">Send</button>
  </div>
</div>

<script>
  // Initialize calorie tracker
  let calorieBudget = 2500; // Set the calorie budget
  let totalCalories = 0; // This will hold the total calories consumed (including fetched data)
  const userId = <?php echo $_SESSION['user_id'] ?? 0; ?>; // Dynamically set userId


  const messagesDiv = document.getElementById('messages');
  const inputField = document.getElementById('input');
  const sendButton = document.getElementById('send');
  const calorieStats = document.getElementById('calorieStats');
  const calorieChartCanvas = document.getElementById('calorieChart');

  // Function to fetch total calories for a user from the database
  async function fetchTotalCalories() {
    try {
        const response = await fetch('http://localhost/Uni/WebProgProject/Sardorlol/site/get_calories.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ user_id: userId })  // Send user_id as form data
        });
        const data = await response.json();

        // Set the totalCalories to the value fetched from the database
        if (data.totalCalories !== undefined) {
            totalCalories = data.totalCalories || 0;  // If no totalCalories in DB, default to 0
            renderCalorieChart(); // Render the chart with the initial totalCalories
        } else {
            console.error("No data returned for totalCalories");
        }
    } catch (error) {
        console.error("Failed to fetch calorie data:", error);
    }
}

  // Fetch data on page load
  document.addEventListener('DOMContentLoaded', fetchTotalCalories);

  // Update total calories and store in the database
  async function updateCalories(calories) {
      console.log("Adding calories:", calories); // Log the incoming calories

      totalCalories = parseFloat(totalCalories);
      // Add the new calories to the existing totalCalories
      totalCalories += Math.round(parseFloat(calories));
      if (totalCalories < 0) totalCalories = 0;  // Prevent negative totalCalories

      console.log("Updated totalCalories:", parseFloat(totalCalories), parseFloat(calories)); // Log the updated total calories

      // Send the updated calorie data to the database
      try {
          await fetch('http://localhost/Uni/WebProgProject/Sardorlol/site/store_calories.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
              body: new URLSearchParams({ user_id: userId, calories: calories })
          });
          renderCalorieChart(); // Trigger chart update
      } catch (error) {
          console.error("Failed to update calorie data:", error);
      }
  }

  // Render the calorie chart
  function renderCalorieChart() {
      const leftCalories = calorieBudget - totalCalories;

      const ctx = calorieChartCanvas.getContext('2d');
      const data = {
          datasets: [{
              data: [totalCalories, leftCalories], // Consumed vs Left
              backgroundColor: ['#28a745', '#ccc'], // Green for consumed, gray for left
              hoverOffset: 4,
          }],
          labels: ['Consumed', 'Left'],
      };

      // Destroy any existing chart instance before creating a new one
      if (window.myChart) {
          window.myChart.destroy();
      }

      window.myChart = new Chart(ctx, {
          type: 'doughnut',
          data: data,
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  tooltip: {
                      callbacks: {
                          label: (tooltipItem) => {
                              const label = tooltipItem.label || '';
                              const value = tooltipItem.raw || 0;
                              return `${label}: ${value} calories`;
                          },
                      },
                  },
                  legend: {
                      display: false, // Hide the legend
                  },
              },
              cutout: '80%', // Inner radius for doughnut
              animation: {
                  animateScale: true,
                  animateRotate: true,
              },
          },
      });

      // Update calorie stats above the chart
      calorieStats.innerHTML = `
          <h3 style="font-size: 2em; margin: 0;">${totalCalories}</h3>
          <p style="font-size: 1.2em; margin: 0;">Left: ${leftCalories}</p>
      `;
  }

  // Function to add messages to the chat
  function addMessage(content, type) {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${type}`;
      messageDiv.textContent = content;

      // Apply inline styles dynamically
      if (type === 'user') {
          messageDiv.style.color = 'blue';
          messageDiv.style.textAlign = 'right';
      } else if (type === 'bot') {
          messageDiv.style.color = 'green';
      }

      messageDiv.style.marginBottom = '10px';

      messagesDiv.appendChild(messageDiv);
      messagesDiv.scrollTop = messagesDiv.scrollHeight;
  }

  // Handle the Send button click
  sendButton.addEventListener('click', async () => {
      const userInput = inputField.value.trim();
      if (!userInput) {
          addMessage('Please enter food or drink details.', 'bot');
          return;
      }

      addMessage(userInput, 'user'); // Add user message
      inputField.value = '';

      try {
          const response = await fetch('http://localhost/Uni/WebProgProject/Sardorlol/site/nutritionix.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
              body: new URLSearchParams({ query: userInput })
          });
          const data = await response.json();

          if (data.foods) {
              data.foods.forEach(food => {
                  const calories = food.nf_calories;
                  addMessage(`${food.food_name}: ${calories} calories`, 'bot');
                  updateCalories(calories); // Update the calorie chart with the fetched calories
              });
          } else if (data.error) {
              addMessage(data.error, 'bot');
          } else {
              addMessage('No data found for your query.', 'bot');
          }
      } catch (error) {
          addMessage('An error occurred. Please try again later.', 'bot');
      }
  });

  // Allow pressing Enter to send messages
  inputField.addEventListener('keypress', (event) => {
      if (event.key === 'Enter') {
          sendButton.click();
      }
  });
</script>



              <div class="offset-top-50">
                <!-- Linear progress bar-->
                <div class="progress-linear" data-to="77">
                  <div class="progress-linear-header clearfix">
                    <div><span class="progress-linear-title p text-ubold pull-left text-uppercase">Callories Consumed Today</span></div>
                    <div><span class="big text-ubold pull-right progress-linear-counter">77</span></div>
                  </div>
                  <div class="progress-linear-body">
                    <div class="progress-linear-bar bg-success"></div>
                  </div>
                </div>
                <div class="offset-top-50">
                  <!-- Linear progress bar-->
                  <div class="progress-linear" data-to="90">
                    <div class="progress-linear-header clearfix">
                      <div><span class="progress-linear-title p text-ubold pull-left text-uppercase">Callories Consumed Yesterday</span></div>
                      <div><span class="big text-ubold pull-right progress-linear-counter">90</span></div>
                    </div>
                    <div class="progress-linear-body">
                      <div class="progress-linear-bar bg-info"></div>
                    </div>
                  </div>
                </div>
                <div class="offset-top-50">
                  <!-- Linear progress bar-->

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Offers-->
      <section class="section-bottom-66 section-xl-bottom-0" data-preset='{"title":"Carousel 2","category":"content, carousel","reload":true,"id":"carousel-2"}'>
        <div class="owl-carousel owl-carousel-default veil-lg-owl-dots veil-owl-nav reveal-lg-owl-nav" data-items="1" data-sm-items="2" data-lg-items="3" data-xl-items="4" data-nav="true" data-dots="true" data-nav-class="[&quot;owl-prev mdi mdi-chevron-left&quot;, &quot;owl-next mdi mdi-chevron-right&quot;]">
          <div>
            <!-- Thumbnail Terry-->
            
          </div>
        </div>
     
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