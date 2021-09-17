<?php
require '../server.php';


if (!isset($_SESSION['id_landlord'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location:../login.php');
}
if (isset($_POST['logout'])) {

  unset($_SESSION['id_landlord']);
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
  <header class="header header--blue" style="background-color: rgb(0, 23, 71);">
    <div class="container">
      <div class="header__main">
        <div class="header__logo">
          <a href="#">
            <h1 style="color: whitesmoke;">Landlord Panel</h1>


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
              <a href="dashboard.php" class="header__nav-link">Home</a>
            </li>


            <li class="header__nav-item">
              <a href="#" class="header__nav-link">Hi, <?php echo $_SESSION['username_landlord']; ?></a>
              <ul>
                <li class="setting"><a href="dashboard.php" class="setting__link">
                    <ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile
                  </a></li>
                <li class="setting"><a href="my_hostel.php" class="setting__link">
                    <ion-icon name="home" class="setting__icon"></ion-icon>My Hostels
                  </a></li>
                <li class="setting"><a href="change-password.php" class="setting__link">
                    <ion-icon name="lock-open" class="setting__icon"></ion-icon>Change Password
                  </a></li>
                <form action="dashboard.php" method="post">
                  <li><input type="submit" value="Logout" name="logout" class="logout" style="background-color: red; color:aliceblue"></li>
                </form>
              </ul>
            </li>
          </ul><!-- .header__nav -->
        </div><!-- .header__menu -->


      </div><!-- .header__main -->
    </div><!-- .container -->
  </header><!-- .header -->
  <!-- <?php
        echo $_SESSION['id_admin'];
        ?> -->
  <section id="container">
    <?php include("includes/config.php"); ?>

    <section id="main-content">
      <section class="wrapper">

        <div class="row">
          <div class="col-lg-9 main-chart">
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

              <div class="property__feature">
                <!-- display image part -->

                <?php
                $query2 = "SELECT * from `img_table` where `hos_id`='$hosid'";
                $query2_run = mysqli_query($con, $query2);

                while ($res = mysqli_fetch_array($query2_run)) {
                ?>

                  <img src="<?php echo "../landlord/" . $res['more_img'] ?>" alt="<?php echo $res['hos_name'] . "" . $res['more_img'] ?>" style="margin: 10px;" class="img_all">


                <?php  }
                ?>

                <!-- get details from hos_details -->
                <?php
                $id = $_GET['hosid'];
                $query3 = "SELECT * from `hos_details` where `ID`='$id'";
                $query3_run = mysqli_query($con, $query3);
                $ress = mysqli_fetch_assoc($query3_run);
                $agent_id = $ress['agent_id'];
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
                  <li class="property__details-item"><span class="property__details-item--cat">friendly address:</span> <?php echo $ress['friendly_add']; ?>
                  <li>
                  <li class="property__details-item"><span class="property__details-item--cat">Services: </span><?php echo $ress['services']; ?>

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

                $query4 = "SELECT * from `details` where `ID`='$agent_id'";
                $query4_run = mysqli_query($con, $query4);
                $result = mysqli_fetch_assoc($query4_run);
                ?>

                <h3 class="property__feature-businessName property__feature-businessName--b-spacing">Hostel Owner details</h3>
                <ul class="property__details-list">
                  <li class="property__details-item"><span class="property__details-item--cat">Name:</span><?php echo $result['FirstName'] . " " . $result['LastName'] ?></li>
                  <li class="property__details-item"><span class="property__details-item--cat">about owner:</span> <?php echo $result['about_me']; ?>
                  <li>
                  <li class="property__details-item"><span class="property__details-item--cat">Email: </span><a href="mailto:<?php echo $result['Email']; ?>"><?php echo $result['Email']; ?></a>
                  <li class="property__details-item"><span class="property__details-item--cat">Phone number: </span><a href="tel:<?php echo $result['phone_no']; ?>"><?php echo $result['phone_no']; ?></a>

                </ul><!-- .property__details-list -->
                <a href="update_hostel.php?edit_hostel=<?php echo $row['ID'] ?>" class="btn btn-success btn-sm">Edit Hostel</a>

              </div><!-- .property__feature -->





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