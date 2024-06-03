<?php 
session_start();

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
      <div><img width='300' height='130' src='images/logo.png' alt=''/>
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
                <div class="rd-navbar-brand"><a href="index1.html"><img width='230' height='50' src='images/logo.png' alt=''/></a></div>
              </div>
              <div class="rd-navbar-menu-wrap">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-mobile-scroll">
                    <!--Navbar Brand Mobile-->
                    <div class="rd-navbar-mobile-brand"><a href="index1.html"><img width='300' height='50' src='images/logo.png' alt=''/></a></div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      
                      <li><a href="index1.html"><span>Home</span></a></li>
                      <li class="active"><a href="http://localhost/Uni/WebProgProject/Sardorlol/site/exe.php"><span>Exercise</span></a></li>
                      <li><a href="exesample.html"><span>Myprogress</span></a></li>
                      <li><a href="exe.html"><span>Nutrition</span></a></li>
                      <li><a href="login.html"><span>LogOut</span></a></li>
                      
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
        <h2>Submit Your Weight</h2>
        <form action="submit_weight.php" method="POST">
            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="text" id="weight" name="weight" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
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

                <div class="col-sm-10 col-md-3 offset-top-66 order-md-2 offset-md-top-0 col-md-6 col-xl-4 order-xl-4">
                  <div class="inset-xl-left-20">
                    <p class="text-uppercase text-spacing-60 font-weight-bold">Newsletter</p>
                    <p class="offset-top-20 text-left">
                      Keep up with our always upcoming  news and updates. Enter your e-mail and
                      subscribe to our newsletter.
                    </p>
                    <div class="offset-top-30">
                            <form class="rd-mailform" data-form-output="form-subscribe-footer" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                              <div class="form-group">
                                <div class="input-group input-group-sm"><span class="input-group-prepend"><span class="input-group-text input-group-icon"><span class="mdi mdi-email novi-icon"></span></span></span>
                                  <input class="form-control" placeholder="Type your E-Mail" type="email" name="email" data-constraints="@Required @Email"><span class="input-group-append">
                                    <button class="btn btn-sm btn-danger" type="submit">Subscribe</button></span>
                                </div>
                              </div>
                              <div class="form-output" id="form-subscribe-footer"></div>
                            </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 col-md-3 offset-top-66 order-md-1 offset-md-top-0 col-md-6 col-xl-3 order-xl-1">
                  <!-- Footer brand-->
                  <div class="footer-brand"><a href="index1.html"><img width='200' height='50' src='images/logo.png' alt=''/></a></div>

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

