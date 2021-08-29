<?php
require '../server.php';


if (!isset($_SESSION['id'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location:../login.php');
}
if (isset($_POST['logout'])) {
  
  unset($_SESSION['id']);
  header("location:../login.php");
}

//get hostel_id
$hosid = $_GET['hosid'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <!-- <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->

  <title>Viewhostel</title>

   <!-- External Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet"> 

    <!-- CSS files -->
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/style.css">
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
   <header class="header header--blue">
    <div class="container">
      <div class="header__main">
        <div class="header__logo">
          <a href="#">
            <h1 style="color: whitesmoke;">Student Panel</h1>
            
            
          </a>
        </div><!-- .header__logo -->

        <div class="nav-mobile">
          <a href="#" class="nav-toggle">
            <span></span>
          </a><!-- .nav-toggle -->
        </div><!-- .nav-mobile -->

        <div class="header__menu header__menu--v1">
          <ul class="header__nav">
            <li class="header__nav-item">
              <a href="index.php" class="header__nav-link">Home</a>
            </li>
            
  
            <li class="header__nav-item">
              <a href="#" class="header__nav-link">Hi, <?php echo $_SESSION['username'];?></a>
            <ul>
              <li class="setting"><a href="dashboard.php" class="setting__link"><ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile</a></li>
            
              <li class="setting"><a href="change-password.php" class="setting__link"><ion-icon name="lock-open" class="setting__icon"></ion-icon>Change Password</a></li>
              <form action="dashboard.php" method="post">
              <li><input type="submit" value="Logout" name="logout" class="logout" style="background-color: red; color:aliceblue" ></li>
              </form>
          </ul>
          </li>
          </ul><!-- .header__nav -->
        </div><!-- .header__menu -->

        
     </div><!-- .header__main -->
   </div><!-- .container -->
 </header><!-- .header -->
  <!-- <?php
        echo $_SESSION['id'];
        ?> -->
  <section id="container">
    <div class="container">
    <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
      <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
      <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
      <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">My Profile</span></li>
    </ul><!-- .ht-breadcrumb -->

    <div class="my-profile__container">
      <div class="row">
        <div class="col-md-3">
          <h2 class="bookmarked-listing__headline">Hello, <strong><?php echo $_SESSION['username'];?></strong></h2>
          <div class="settings-block">
            <span class="settings-block__title">Manage Account</span>
            <ul class="settings">
              <li class="setting setting--current"><a href="dashboard.php" class="setting__link"><ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile</a></li>
            </ul><!-- settings -->
          </div><!-- .settings-block -->

          <div class="settings-block">
            <span class="settings-block__title">Manage Listing</span>
            <ul class="settings">
          
              <li class="setting "><a href="viewhostel.php" class="setting__link"><ion-icon name="cloud-upload" class="setting__icon"></ion-icon>View Approved Hostels</a></li>
              
            </ul><!-- settings -->
          </div><!-- .settings-block -->

          <div class="settings-block">
            <ul class="settings">
              <li class="setting"><a href="change-password.php" class="setting__link"><ion-icon name="lock-open" class="setting__icon"></ion-icon>Change Password</a></li>
              <form action="dashboard.php" method="post">
              <li><input type="submit" value="Logout" name="logout" class="logout" style="background-color: red; color:aliceblue" ></li>
              </form>
            </ul><!-- settings -->
          </div><!-- .settings-block -->
        </div><!-- .col -->

    <?php include("includes/core_inc.php"); ?>
    <section id="main-content">
      <section class="wrapper">

        <div class="row">
          <div class="col-md-8 main-chart">
            <!-- <h1>View Hostel</h1> -->



            <?php
            if ($hosid != 0 || !empty($hosid)) {
              $query = "SELECT * from hos_details where `ID`='$hosid'";
              $query_run = mysqli_query($con, $query);
              $row = mysqli_fetch_array($query_run);
            }
            ?>

            <section class="property">
              <div class="property__header">
                <div class="container">
                  <div class="property__header-container">
                    <ul class="property__main">
                      <li class="property__businessName property__main-item">
                        <div class="property__meta">
                          <span class="property__offer"><?php echo "For Rent"; ?></span>
                          <span class="property__type">
                            
                            <h5><?php echo $row['hos_type']; ?></h5>
                          </span>
                        </div><!-- .property__meta -->
                        <h2 class="property__name"><?php echo $row['hos_name']; ?></h2>
                        <span class="property__address"><i class="ion-ios-location-outline property__address-icon"></i><?php echo $row['location']; ?></span>
                      </li>
                      <li class="property__price property__main-item">
                        <h4 class="property__price-primary">KSH <?php echo $row['price']; ?>/month</h4>
                      </li>
                    </ul><!-- .property__main -->

                  </div><!-- .property__header-container -->
                </div><!-- .container -->
              </div><!-- .property__header -->

              <div class="property__feature"> <!-- display image part -->

                <?php 
                  $query2="SELECT * from `img_table` where `hos_id`='$hosid'";
                  $query2_run=mysqli_query($con,$query2);
                  
                  while ($res=mysqli_fetch_array($query2_run)) {
                    ?>
                    
                      <img src="<?php echo "../landlord/" .$res['more_img'] ?>" alt="<?php echo $res['hos_name']."".$res['more_img'] ?>" style="margin: 10px;">
                    

                <?php  }
                ?>

                <!-- get details from hos_details -->
                <?php 
                  $id=$_GET['hosid'];
                  $query3="SELECT * from `hos_details` where `ID`='$id'";
                  $query3_run=mysqli_query($con,$query3);
                  $ress=mysqli_fetch_assoc($query3_run);
                  $agent_id=$ress['agent_id'];
                  $address = $ress['location'];
                  $address = str_replace(" ", "+", $address);
                ?>

              </div>

              <div class="property__feature">
                <h3 class="property__feature-businessName property__feature-businessName--b-spacing">Property Description</h3>
                <!-- <?php echo $id; ?> -->
                <p><?php echo $ress['description']; ?></p>
              </div><!-- .property__feature -->

              <div class="property__feature">
                <h3 class="property__feature-businessName property__feature-businessName--b-spacing">Property Details</h3>
                  <ul class="property__details-list">
                    <li class="property__details-item"><span class="property__details-item--cat">Location:</span><?php echo $ress['location']; ?></li>
                    <li class="property__details-item"><span class="property__details-item--cat">friendly address:</span> <?php echo $ress['friendly_add']; ?><li>
                    <li class="property__details-item"><span class="property__details-item--cat">Services: </span><?php  echo $ress['services']; ?>
                    <li class="property__details-item"><span class="property__details-item--cat">People per room: </span><?php  echo $ress['share_no']; ?>   
                    <li class="property__details-item"><span class="property__details-item--cat">Beds available: </span><?php  echo $ress['bed_no']; ?>                    
                   </ul><!-- .property__details-list -->
                   <iframe width="100%" height="250" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                </div><!-- .property__feature -->

                <div class="property__feature">
                    <h3 class="property__feature-businessName property__feature-businessName--b-spacing">Rules</h3>
                    <ul class="property__features-list">
                         <?php
                        $rules =  $ress['rules'];
                          ?>
                          <li class="property__details-item
                          "><?php echo $rules; ?></li>

                     </ul><!-- .property__features-list -->
                </div><!-- .property__feature -->


                <div class="property__feature">

                <?php 
                    
                    $query4="SELECT * from `details` where `ID`='$agent_id'";
                    $query4_run=mysqli_query($con,$query4);
                    $result=mysqli_fetch_assoc($query4_run);
                ?>

                <h3 class="property__feature-businessName property__feature-businessName--b-spacing">Hostel Owner details</h3>
                  <ul class="property__details-list">
                    <li class="property__details-item"><span class="property__details-item--cat">Name:</span><?php echo $result['FirstName']." ".$result['LastName'] ?></li>
                    <li class="property__details-item"><span class="property__details-item--cat">about owner:</span> <?php echo $result['about_me']; ?><li>
                    <li class="property__details-item"><span class="property__details-item--cat">Email: </span><a href="mailto:<?php echo $result['Email']; ?>"><?php  echo $result['Email']; ?></a>
                    <li class="property__details-item"><span class="property__details-item--cat">Phone number: </span><a href="tel:<?php echo $result['phone_no']; ?>"><?php  echo $result['phone_no']; ?></a>
                                            
                


                </div><!-- .property__feature -->



                           
                                <div class="widget__container">
                                  <section class="widget" id="contact_agent">
                                        <form method = "POST" action="includes/contact_form.php?prpID=<?php echo $hosid ?>" class="contact-form contact-form--white" id="contact_form">
                                            <div style="padding:10px" class="contact-form__body">
                                            <input type="hidden" name="student_id" value="<?php echo $_SESSION['id']; ?>">
                                            <input type="hidden" name="hostel_id" value="<?php echo $hosid; ?>">
                                            <input type="hidden" name="id_for_agent" value="<?php echo $row['agent_id'] ?>">
                                            <input type="hidden" name="hostel_name" value="<?php echo $row['hos_name']; ?>">
                                                <h3 style="text-align:center; padding:10px"> Contact Form </h3><br>
                                                <input type="text"  class="contact-form__field" placeholder="Name" name="name" required>                                           
                                                <input type="email" class="contact-form__field" placeholder="Email" name="Email" required>
                                                <input type="tel" class="contact-form__field" placeholder="Phone number" name="phonenumber">
                                                  <input type="date" class="contact-form__field" placeholder="Start your stay from..." name="date" required>
                                                <textarea class="contact-form__field contact-form__comment" cols="30" rows="5" placeholder="Comment" name="comment" required></textarea>
                                            
                                            </div><!-- .contact-form__body -->

                                            <div class="contact-form__footer">
                                              <input type="submit" class="contact-form-con" name="submit_contact_far" style="width: 33%; background-color: rebeccapurple;" value="Intrested But Far">
                                              <input type="submit" class="contact-form-con" name="submit_contact_expensive" style="width: 33%; background-color: red;" value="Intrested But Expensive">
                                              <input type="submit" class="contact-form-con" name="submit_contact_form"style="width: 33%;" value="Contact Owner For Booking">
                                            </div><!-- .contact-form__footer -->
                                            
                                        </form><!-- .contact-form -->
                                    </section><!-- .widget -->
                                </div>
                           
                 </div><!-- .col -->
                </form>




            </section> <!-- end of property section -->



          </div>
        </div>
        </div><!-- /row mt -->

      </section>

    </section>

    <!-- footer -->
    <?php include "includes/footer.php" ?>
  </section>

  <!-- icon show script -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
<script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
<script src="js/custom.js"></script>  
</body>

</html>