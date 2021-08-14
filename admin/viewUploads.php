<?php 
require '../server.php';
  

  if (!isset($_SESSION['id_admin'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location:../login.php');
  }
  if (isset($_POST['logout'])) {
  	
  	unset($_SESSION['id_admin']);
  	header("location:../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>all hostel</title>
    
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

   
    <style type="text/css">
      
    </style>
</head>
<body>
<section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<?php include("includes/core_inc.php");?>
 <!-- include datafile -->
  <section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i>All Submitted Hostels</h3>
		  	<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">id</th>
                                  <th style="text-align: center">Image</th>
                                  <th style="text-align: center">Property Detail</th>
                                  <th style="text-align: center">Date Uploaded</th>
                                  <th style="text-align: center">Action</th>
   
                              </tr>
                              </thead>
                              <tbody>
                                  <!-- function to populate should be here -->
                                <?php echo approved_hostel(); ?>

                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
<?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script> <!--script for nav and side bar shrink -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    

  </body>
</html>

