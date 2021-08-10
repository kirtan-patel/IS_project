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

    <title>Landlord Dashboard</title>

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
                <form action="submit_hostel.php" method="post" enctype="multipart/form-data" id="myform">
                    <div class="col-md-9">
                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Add New property <?php echo $_SESSION['username'] ?></h3>

                            <div class="submit-property__group">
                                <label for="property-title" class="submit-property__label">Hostel Name *</label>
                                <input type="text"  name="title" id="property-title" placeholder="Name of house" required>
                            </div><!-- .submit-property__group -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-type" class="submit-property__label">Hostel Type *</label>
                                        <!-- <input type="text"  id="property-price" name="hos_type" required> -->
                                        <select class="ht-field" id="property-type" name="hos_type" required>
                                            <option disabled="disabled">Choose room Types</option>
                                            <option >Private room</option>
                                            <option >Shared room</option>
                                            
                                        </select>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                
                            </div><!-- .row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-price" class="submit-property__label">Property Price *</label>
                                        <input type="number"  id="property-price" name="price" required>
                                        <span class="submit-property__unit">#</span>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                            </div><!-- .row -->

                            <div class="submit-property__group">
                                <label for="submit-property-wysiwyg" class="submit-property__label">Description *</label>
                                <textarea required cols="30" rows="20" name="description" style="border-color:#000000; border-width:1px;"></textarea>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__block -->

                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Gallery</h3>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="submit-property__group">
                                        <label for="property-featured-image" class="submit-property__label">Featured Image *</label>
                                        <div class="submit-property__upload">
                                            <input type="file" required name="feat_image">
                                            <div class="submit-property__upload-inner">
                                                <span class="ion-ios-plus-outline submit-property__icon"></span>
                                                <span class="submit-property__upload-desc">Drop image here or click to upload</span><br>
                                                <span class="submit-property__upload-desc">Upload png,jpeg</span>
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-7">
                                    <div class="submit-property__group">
                                        <label for="property-media" class="submit-property__label">All Images or Video *</label>
                                        <div class="submit-property__upload">
                                            <input type="file" required name="images[]" multiple>
                                            <div class="submit-property__upload-inner">
                                                <span class="ion-ios-plus-outline submit-property__icon"></span>
                                                <span class="submit-property__upload-desc">Drop all images here or click to upload</span><br>
                                                <span class="submit-property__upload-desc">Upload png,jpeg</span>
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .submit-property__block -->

                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Location</h3>
                          <!-- .submit-property__group -->

                            <div class="submit-property__group">
                                <label for="state" class="submit-property__label">Location*</label>
                                <input type="text" value="" name="location">
                                
                          </div>

                        <div class="submit-property__group">
                            <label for="property-address" class="submit-property__label">Friendly Address</label>
                            <input required type="text"  id="property-address" name="address">
                        </div><!-- .submit-property__group -->
                    </div><!-- .submit-property__block -->

                    <div class="submit-property__block">
                        <h3 class="submit-property__headline"> Available Services</h3>
                        <div class="submit-property__features">
                            <div class="submit-property__group">
                                <textarea cols="10" rows="10"  id="property-map-address" name="services"></textarea>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__features -->
                    </div><!-- .submit-property__block -->

                    <div class="submit-property__block">
                        <h3 class="submit-property__headline">Rules</h3>
                        <div class="submit-property__features">
                            <div class="submit-property__group">
                               <div class="col-md-5">
                                    <div class="submit-property__group">
                                        <label for="property-map-address" class="submit-property__label">If any?</label>
                                        <textarea cols="10" rows="10"  id="property-map-address" name="rules"></textarea>
                                    </div><!-- .submit-property__group -->
                               </div>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__features -->
                    </div><!-- .submit-property__block --><br/><br/>
                    <div class="submit-property__block">
                    <div class="row">
                    <input type="submit" value="Upload Hostel" class="submit-property__submit" name="submit_property">
                    </div>
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

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
  </body>
</html>

