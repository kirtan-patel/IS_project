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
  if (isset($_GET['edit_hostel'])) {
    $edit_id=$_GET['edit_hostel'];
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

  <section id="container" >
<?php include("includes/core_inc.php");?>


<!-- php code to get data of hostel to be edited -->
<?php 


  $query="SELECT * from `hos_details` where `ID`='$edit_id'";
  $query_run=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($query_run);

?>
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
              <a href="#" class="header__nav-link">Hi, <?php echo $_SESSION['username_landlord'];?></a>
            <ul>
              <li class="setting"><a href="dashboard.php" class="setting__link"><ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile</a></li>
              <li class="setting"><a href="my_hostel.php" class="setting__link"><ion-icon name="home" class="setting__icon"></ion-icon>My Hostel</a></li>
              <li class="setting"><a href="change-password.php" class="setting__link"><ion-icon name="lock-open" class="setting__icon"></ion-icon></i>Change Password</a></li>
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

 <div class="container">
    <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
      <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
      <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
      <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">Edit Hostel</span></li>
    </ul><!-- .ht-breadcrumb -->

    <div class="my-profile__container">
      <div class="row">
        <div class="col-md-3">
          <h2 class="bookmarked-listing__headline">Hello, <strong><?php echo $_SESSION['username_landlord'];?></strong></h2>
          <div class="settings-block">
            <span class="settings-block__title">Manage Account</span>
            <ul class="settings">
              <li class="setting setting--current"><a href="dashboard.php" class="setting__link"><ion-icon name="people-circle" class="setting__icon"></ion-icon>My Profile</a></li>
            </ul><!-- settings -->
          </div><!-- .settings-block -->

          <div class="settings-block">
            <span class="settings-block__title">Manage Listing</span>
            <ul class="settings">
              <li class="setting"><a href="my_hostel.php" class="setting__link"><ion-icon name="home" class="setting__icon"></ion-icon>My Hostel</a></li>
              <li class="setting "><a href="resubmit_hostel.php" class="setting__link"><ion-icon name="refresh-circle" class="setting__icon"></ion-icon>Resubmit Hostel</a></li>
              <li class="setting "><a href="submit_hostel.php" class="setting__link"><ion-icon name="cloud-upload" class="setting__icon"></ion-icon>Add new Hostel</a></li>
              <li class="setting"><a href="viewContact.php" class="setting__link"><ion-icon name="eye" class="setting__icon"></ion-icon>View Contacts</a></li>
    
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

      
                <form action="update_hostel.php" method="post" enctype="multipart/form-data" id="myform">
                    <div class="col-md-9">
                        <div class="submit-property__block">
                            <h3 class="submit-property__headline"> <b> EDIT HOSTEL <?php echo $row['hos_name'] ?></b></h3>
                            <input type="hidden" value="<?php echo $edit_id ?>" name="hos_id">

                            <div class="submit-property__group">
                                <label for="property-title" class="submit-property__label">Hostel Name *</label>
                                <input type="text" class="submit-property__field" name="title" id="property-title" placeholder="Name of house" value="<?php echo $row['hos_name'] ?>" required>
                            </div><!-- .submit-property__group -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-type" class="submit-property__label">Hostel Type *</label>
                                        <!-- <input type="text"  id="property-price" name="hos_type" required> -->
                                        <select class="ht-field" id="property-type" name="hos_type"   required>
                                        <option><?php echo $row['hos_type']; ?></option>
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
                                        <span class="submit-property__unit">KSH/Month</span>
                                        <input type="number"  id="property-price" name="price" class="submit-property__field" placeholder="eg 10000" value="<?php echo $row['price'] ?>" required>
                                        
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                            </div><!-- .row -->

                            <div class="submit-property__group">
                                <label for="submit-property-wysiwyg" class="submit-property__label">Description *</label>
                                <textarea required cols="30" rows="20" class="submit-property__field" name="description" placeholder="Write a detailed description of the hostel and its surrounding" style="border-color:#1fc341; border-width:1px;" ><?php echo $row['description'] ?></textarea>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__block -->



                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Location</h3>
                          <!-- .submit-property__group -->

                            <div class="submit-property__group">
                                <label for="state" class="submit-property__label" >Location*</label>
                                <input type="text"  name="location" placeholder="eg kodi road, plot number 5" class="submit-property__field" value="<?php echo $row['location'] ?>" required>
                                
                          </div>

                        <div class="submit-property__group">
                            <label for="property-address" class="submit-property__label">Friendly Address</label>
                            <input required type="text"  id="property-address" class="submit-property__field" name="address" placeholder="Opposite..../next to...." value="<?php echo $row['friendly_add'] ?>" required>
                        </div><!-- .submit-property__group -->
                    </div><!-- .submit-property__block -->

                    <div class="submit-property__block">
                        <h3 class="submit-property__headline"> Available Services</h3>
                        <div class="submit-property__features">
                            <div class="submit-property__group">
                                <textarea cols="10" rows="10"  id="property-map-address" class="submit-property__field"  name="services" placeholder="What services do you offer? fulltime food, internet.....etc"><?php echo $row['services'] ?></textarea>
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
                                        <textarea cols="10" rows="10" class="submit-property__field"  id="property-map-address" name="rules" placeholder="Mandatory rules to be followed" required><?php echo $row['rules'] ?></textarea>
                                    </div><!-- .submit-property__group -->
                               </div>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__features -->
                    </div><!-- .submit-property__block --><br/><br/>
                    <div class="submit-property__block">
                    <div class="row">
                    <input type="submit" value="Update Hostel" class="submit-property__submit" name="update_hostel">
                    </div>
                    </div>
                 </div><!-- .col -->
                </form>
          
      
    
  </section>
  <!-- footer -->
  <?php include "includes/footer.php" ?>

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

