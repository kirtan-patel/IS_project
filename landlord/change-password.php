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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>change Password</title>

  <!-- External Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet">

  <!-- CSS files -->
  <link rel="stylesheet" href="css/plugins.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <section id="container">
    <?php include("includes/core_inc.php"); ?>


    <header class="header header--blue">
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
                <a href="index.php" class="header__nav-link">Home</a>
              </li>


              <li class="header__nav-item">
                <a href="#" class="header__nav-link">Hi, <?php echo $_SESSION['username_landlord']; ?></a>
                <ul>
                  <li class="setting"><a href="dashboard.php" class="setting__link">
                      <ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile
                    </a></li>
                  <li class="setting"><a href="my_hostel.php" class="setting__link">
                      <ion-icon name="home" class="setting__icon"></ion-icon>My Hostel
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

    <div class="container">
      <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
        <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
        <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
        <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">Change password</span></li>
      </ul><!-- .ht-breadcrumb -->

      <div class="my-profile__container">
        <div class="row">
          <div class="col-md-3">
            <h2 class="bookmarked-listing__headline">Hello, <strong><?php echo $_SESSION['username_landlord']; ?></strong></h2>
            <div class="settings-block">
              <span class="settings-block__title">Manage Account</span>
              <ul class="settings">
                <li class="setting setting--current"><a href="dashboard.php" class="setting__link">
                    <ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile
                  </a></li>
              </ul><!-- settings -->
            </div><!-- .settings-block -->

            <div class="settings-block">
              <span class="settings-block__title">Manage Listing</span>
              <ul class="settings">
                <li class="setting"><a href="my_hostel.php" class="setting__link">
                    <ion-icon name="home" class="setting__icon"></ion-icon>My Hostel
                  </a></li>
                <li class="setting "><a href="resubmit_hostel.php" class="setting__link">
                    <ion-icon name="refresh-circle" class="setting__icon"></ion-icon>Resubmit Hostel
                  </a></li>
                <li class="setting "><a href="submit_hostel.php" class="setting__link">
                    <ion-icon name="cloud-upload" class="setting__icon"></ion-icon>Add new Hostel
                  </a></li>
                <li class="setting"><a href="viewContact.php" class="setting__link">
                    <ion-icon name="eye" class="setting__icon"></ion-icon>View Contacts
                  </a></li>
                <li class="setting"><a href="viewreport.php" class="setting__link">
                    <ion-icon name="eye" class="setting__icon"></ion-icon>View Reports
                  </a></li>


              </ul><!-- settings -->
            </div><!-- .settings-block -->

            <div class="settings-block">
              <ul class="settings">
                <li class="setting"><a href="change-password.php" class="setting__link">
                    <ion-icon name="lock-open" class="setting__icon"></ion-icon>Change Password
                  </a></li>
                <form action="dashboard.php" method="post">
                  <li><input type="submit" value="Logout" name="logout" class="logout" style="background-color: red; color:aliceblue"></li>
                </form>
              </ul><!-- settings -->
            </div><!-- .settings-block -->
          </div><!-- .col -->

          <form method="POST" action="change-password.php">
            <div class="col-md-9">


              <label for="profile-new-password" class="my-profile__label">New Password</label>
              <input type="password" required name="newpassword" class="my-profile__field" id="profile-new-password">

              <button type="submit" name="submit_new_password" class="my-profile__submit">Save Changes</button>
            </div><!-- .col -->
          </form>



  </section>
  <?php include("includes/footer.php"); ?>

  <!-- JS Files -->
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
  <script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
  <script src="js/custom.js"></script>
  <!-- icon show script -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>