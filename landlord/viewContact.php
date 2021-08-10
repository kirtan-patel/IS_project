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
 <!-- include datafile -->
  <section id="main-content">
    <section class="wrapper">
      <!-- >all contact -->
		  	<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">id</th>
                                  <th style="text-align: center">Name</th>
                                  <th style="text-align: center">Phone number</th>
                                  <th style="text-align: center">Email</th>
                                  <th style="text-align: center">Message</th>
                                  <th style="text-align: center">Received on</th>
   
                              </tr>
                              </thead>
                              <tbody>
                                  <!-- function to populate should be here -->
                                <div class="manage-list__item">
                                    <tr class="manage-list__item-container">
                                        <td>
                                          1
                                        </td>
                                        <td class="manage-list__item-img">
                                            Kirtan Patel
                                        </td>
                                        
                                        <td class="manage-list__item-detail">
                                            <a href="tel:+">07XXXXXXXX</a>
                                        </td>

                                        <td class="manage-list__expire-date">
                                            <a href="mailto:123@gmail.com">123@gmail.com</a>
                                        </td>

                                        <td class="manage-list__action">
                                            <p>message</p>
            	                        </td>

                                        <td class="manage-list__action">
                                            <p>july 20, 2021</p>
            	                        </td>

                                    </tr>

                                </div>

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

