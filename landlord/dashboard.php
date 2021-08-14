<?php 
require '../server.php';
  

  if (!isset($_SESSION['id_landlord'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location:../login.php');
    
  }
  if (isset($_POST['logout'])) {
    unset($_SESSION['id_landlord']);
  	
  	
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
    <!-- <?php 
       echo $_SESSION['id_landlord'];
    ?> -->
  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<?php include("includes/core_inc.php");?>
      <section id="main-content">
          <section class="wrapper">
            <?php
                require '../config.php';
                $user_ID=$_SESSION['id_landlord'];
                $qu="SELECT * FROM `details` WHERE `ID`='$user_ID'";
                $run=mysqli_query($con,$qu);
                $row=mysqli_fetch_assoc($run);
            ?>
              <div class="row">
              <form method="POST" action="dashboard.php" enctype="multipart/form-data">
          <div class="col-md-4">
            <label for="profile-first-name" class="my-profile__label">First Name</label>
            <input type="text" name="fname" value="<?php echo $row['FirstName'] ?>" class="my-profile__field" id="profile-first-name">

            <label for="profile-first-name" class="my-profile__label">Last Name</label>
            <input type="text" name="lname" value="<?php echo $row['LastName'] ?>" class="my-profile__field" id="profile-first-name">

            

            <label for="profile-number" class="my-profile__label">Phone Number*</label>
            <input type="number" value="<?php echo $row['phone_no'] ?>"  required onkeypress="if(this.value.length==12)return false;" name="phone" placeholder="07XXXXXXXX" class="my-profile__field" id="profile-number">

           

            <label for="profile-email" class="my-profile__label">Email*</label>
            <input type="email" value="<?php echo $row['Email']?>" required name="email" class="my-profile__field" id="profile-email">



          </div><!-- .col -->

          <div class="col-md-5">
            <label for="profile-introduce" class="my-profile__label">About Me</label>
            <textarea id="profile-introduce" required name="about"   rows="10" class="my-profile__field"><?php echo $row['about_me'] ?></textarea>


            <input type="submit" name="submit_update" class="my-profile__submit" value="Update profile">
            
          </div><!-- .col -->
        </form>
                 
                  </div>
                </div>
                </div><!-- /row mt -->
                	
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

