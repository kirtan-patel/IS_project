<?php 
require '../server.php';
  
    
  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location:../login.php');
  }
  if (isset($_POST['logout'])) {
  	session_destroy();
  	unset($_SESSION['id']);
  	header("location:../login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Student Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<?php include("includes/core_inc.php");?>
      <section id="main-content">
          <section class="wrapper">
              
                <form action="#" method="post" enctype="multipart/form-data" id="myform">
                    <div class="col-lg-">
                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">>Contact hostel owner</h3>
<div class="property__container">
                    <div class="container">
                        <div class="row">
                            <main class="col-md-9">
                                <div class="property__feature-container">
                                    <div class="property__slider property__slider--v2">
                                        <div class="property__slider-container">

                                            <div class="property__slider-main">
                                                <div class="property__slider-images">
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/download.gif"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/Al barka lodge_Al barka l.jpg"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/Al barka lodge_Al barka lodge.jpg"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/Al barka lodge_Al barka.jpg"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/Al barka lodge_Al brka.jpg"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                            <div class="property__slider-image">
                                                                                                                            <img src="assets/img/Al barka lodge_Albarka.jpg"  style=" height: 500px;" alt="Image 1">
                                                                                                                         </div><!-- .property__slider-image -->
                                                                                                    </div><!-- .property__slider-images -->

                                                <ul class="image-navigation">
                                                    <li class="image-navigation__prev">
                                                        <span><i class="fas fa-angle-left"></i></span>
                                                    </li>
                                                    <li class="image-navigation__next">
                                                        <span><i class="fas fa-chevron-right"></i></span>
                                                    </li>
                                                </ul>

                                                <span class="property__slider-info"><i class="fas fa-camera-retro"></i><span class="sliderInfo"></span></span>

                                            </div><!-- .property__slider-main -->

                                            <ul class="property__slider-nav property__slider-nav--horizontal">

                                                <li class="property__slider-item">
                                                                                                                                                                        <img src="assets/img/download.gif" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                                                                                                                                    <img src="assets/img/Al barka lodge_Al barka l.jpg" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                                                                                                                                    <img src="assets/img/Al barka lodge_Al barka lodge.jpg" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                                                                                                                                    <img src="assets/img/Al barka lodge_Al barka.jpg" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                                                                                                                                    <img src="assets/img/Al barka lodge_Al brka.jpg" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                                                                                                                                    <img src="assets/img/Al barka lodge_Albarka.jpg" alt="Image 1">
                                                                                                                 </li><!-- .property__slider-item -->
                                                


                                            </ul><!-- .property__slider-nav -->
                                        </div><!-- .property__slider-container -->
                                    </div><!-- .property__slider -->


 
                                </div><!-- .property__feature-container -->
                            </main>
                            <aside class="col-md-3">     
                                <div class="widget__container">
                                  <section class="widget" id="contact_agent">
                                        <form method = "POST" action="assets/includes/contact_prop_form.php?prpID=5" class="contact-form contact-form--white" id="contact_form">
                                            

                                            <div style="padding:10px" class="contact-form__body">
                                                <h3 style="text-align:center; padding:10px"> Contact Form </h3><br>
                                                <input type="text"  class="contact-form__field" placeholder="First Name" name="fname" required>
                                                <input type="text" class="contact-form__field" placeholder="Last Name" name="lname" required>
                                                <input type="email" class="contact-form__field" placeholder="Email" name="email" required>
                                                <input type="tel" class="contact-form__field" placeholder="Phone number" name="phone_number">
                                                <textarea class="contact-form__field contact-form__comment" cols="30" rows="5" placeholder="Comment" name="comment" required></textarea>
                                            
                                            </div><!-- .contact-form__body -->

                                            <div class="contact-form__footer">
                                                <input type="submit" class="contact-form__submit" name="submit_contact_form" value="Contact Owner">
                                            </div><!-- .contact-form__footer -->
                                        </form><!-- .contact-form -->
                                    </section><!-- .widget -->
                                </div>
                           
                 </div><!-- .col -->
                </form>
          </section>
          
      </section>
      
    <!-- footer -->
    <?php include "includes/footer.php" ?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
    <script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>  
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/plugins.js"></script>
    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
  </body>
</html>

