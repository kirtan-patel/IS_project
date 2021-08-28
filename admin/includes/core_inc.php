<?php

    if (isset($_POST['submit_update'])) {
        save_profile();
    }

    function save_profile(){
        require 'config.php';
        $user_id=$_SESSION['id_admin'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $about=$_POST['about'];
        

        $qu="UPDATE `details` SET `FirstName`='$fname',`LastName`='$lname',`Email`='$email',`phone_no`='$phone',`about_me`='$about' WHERE `ID`='$user_id'";
        
        if (mysqli_query($con,$qu)) {
            ?>
            <script>
                window.alert("Profile updated, please login in back");
                window.location.href="../login.php";
            </script>
            
           <?php 
        }else{
            echo "<script>alert('Something went wrong, try again')
                   </script>";
            header("Location:dashboard.php");
            
        }

    }
?>



<?php
if (isset($_POST['submit_admin'])) {
    add_admin();
}

    function add_admin(){
        require 'config.php';
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pnumber=$_POST['phone_no'];
        $pass=$_POST['newpassword'];

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM `details` WHERE `Email`='$email' LIMIT 1";
        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {//if user exist
            if ($user['Email']==$email) {//if user exists
                ?>
                    <script>
                        window.alert("The user email already exists")
                    </script>
           <?php }
        }else{
            $password=md5($pass);
            $query = "INSERT INTO `details`( `FirstName`, `LastName`, `Email`, `phone_no`,`Password`, `Type`) VALUES ('$fname','$lname','$email','$pnumber','$password','admin')";
  	        mysqli_query($con, $query);
              ?>
              <script>
                  window.alert("Admin has been added")
              </script>
       <?php }
    }
    ?>

    <?php 
    if (isset($_POST['submit_new_password'])) {
        change_pass();
    }
    function change_pass(){
        require 'config.php';
        $newpass=$_POST['newpassword'];
        $newpass1=md5($newpass);
        $newid=$_SESSION['id_admin'];
        $q="UPDATE `details` set `Password`='$newpass1' where `ID`='$newid'";
        if (mysqli_query($con,$q)) {
            ?>
            <script>
                window.alert("Password has been updated, Login again!")
            </script>
        <?php
      header("Location:../login.php");
  }else
  ?> 
    <script>
        window.alert("oppsii, we ran into a problem updating the password, kindly try again")
    </script>
  <?php  }
   ?>

<?php 
    function unapproved_hostel(){
        require 'config.php';
        $query="SELECT * from `hos_details` where `isActive`= 1 and `agent_active`= 0";
        $query_run=mysqli_query($con,$query);
        $i=1;

        while ($row=mysqli_fetch_assoc($query_run)) {
            $propid=$row['ID'];
            
            ?> 

               <li class="manage-list__item">
                    <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                            <?php echo $i++ ?>
                        </div>
                        <div class="manage-list__item-img">
                            <a href="">
                                <img src="<?php echo "../landlord/".$row['ft_img']; ?>"alt="<?php echo $row['hos_name'].' image' ?>" width="170px" height="200px" class="img_edit">
                            </a>
                        </div>
                        <div class="manage-list__item-detail">
                            <h3 class="listing__title"><a href="viewhostel.php?hosid=<?php echo $row['ID'] ?>"><?php echo $row['hos_name']; ?></a></h3>
                            <p class="listing_location"><ion-icon name="location-outline"></ion-icon>Location: <?php echo $row['location'] ?></p>
                            <p class="listing_price"><ion-icon name="pricetag-outline" ></ion-icon>Price: KSH <?php echo $row['price'] ?></p>
                            <p class="listing_price"><ion-icon name="warning-outline" ></ion-icon>Rules <?php echo $row['rules'] ?></p>
                            <p class="listing_price"><ion-icon name="pricetag-outline" ></ion-icon>Hostel Type <?php echo $row['hos_type'] ?></p>
                            <p class="listing_price"><ion-icon name="cafe-outline" ></ion-icon>Services: <?php echo $row['services'] ?></p>
                        </div>
                    </div><!--end for manage-list container -->
                    <div class="manage-list__expire-date"><!-- div for date -->
                        <?php echo $row['uploaded_on'] ?>
                    </div><!--end for date div -->

                    <div class="manage-list__action">
                        <!-- <a href="update_hostel.php?edit_hostel=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><br>
                        <a href="includes/remove_hostel.php?remove=<?php echo $row['ID'] ?>" class="remove" id="#"><i class="fa fa-times" aria-hidden="true"></i> Remove</a> -->
                        <a href="includes/approve_hostel.php?status=<?php echo$row['ID'] ?>" class="btn btn-success btn-sm" ><ion-icon name="checkmark-outline"></ion-icon>Approve</a>
                    </div>

                </li><!--end for li -->

       <?php }
    }
?>
<!-- view all aproved hostel -->
<?php
function approved_hostel(){
        require 'config.php';
        $query="SELECT * from `hos_details` where `isActive`= 0 and `agent_active`= 0";
        $query_run=mysqli_query($con,$query);
        $i=1;

        while ($row=mysqli_fetch_assoc($query_run)) {
            $propid=$row['ID'];
            ?> 

<li class="manage-list__item">
                    <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                            <?php echo $i++ ?>
                        </div>
                        <div class="manage-list__item-img">
                            <a href="">
                                <img src="<?php echo "../landlord/".$row['ft_img']; ?>"alt="<?php echo $row['hos_name'].' image' ?>" width="170px" height="200px" class="img_edit">
                            </a>
                        </div>
                        <div class="manage-list__item-detail">
                            <h3 class="listing__title"><a href="viewhostel.php?hosid=<?php echo $row['ID'] ?>"><?php echo $row['hos_name']; ?></a></h3>
                            <p class="listing_location"><ion-icon name="location-outline"></ion-icon>Location: <?php echo $row['location'] ?></p>
                            <p class="listing_price"><ion-icon name="pricetag-outline" ></ion-icon>Price: KSH <?php echo $row['price'] ?></p>
                            <p class="listing_price"><ion-icon name="warning-outline" ></ion-icon>Rules <?php echo $row['rules'] ?></p>
                            <p class="listing_price"><ion-icon name="pricetag-outline" ></ion-icon>Hostel Type <?php echo $row['hos_type'] ?></p>
                            
                            <p class="listing_price"><ion-icon name="cafe-outline" ></ion-icon>Services: <?php echo $row['services'] ?></p>
                        </div>
                    </div><!--end for manage-list container -->
                    <div class="manage-list__expire-date"><!-- div for date -->
                        <?php echo $row['uploaded_on'] ?>
                    </div><!--end for date div -->

                    <div class="manage-list__action">
                        <!-- <a href="update_hostel.php?edit_hostel=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><br>
                        <a href="includes/remove_hostel.php?remove=<?php echo $row['ID'] ?>" class="remove" id="#"><i class="fa fa-times" aria-hidden="true"></i> Remove</a> -->
                        <!-- <a href="includes/approve_hostel.php?status=<?php echo$row['ID'] ?>" class="btn btn-success btn-sm" ><ion-icon name="checkmark-outline"></ion-icon>Approve</a> -->
                        <a href="includes/approve_hostel.php?disapprove=<?php echo$row['ID'] ?>" class="remove" ><i class="fa fa-times" aria-hidden="true"></i> Disapprove</a>
                        
                    </div>

                </li><!--end for li -->

       <?php }
    }
?>

<?php 

    function feedback_user(){
        require 'config.php';
        $query="SELECT * from `feedback`";
        $query_run=mysqli_query($con,$query);
        $i=1;
        while ($row=mysqli_fetch_assoc($query_run)) {
         ?>
         
         <tr>
                     <td><?php echo $i++; ?></td>

                     <td class="table-stuff">
                        <?php echo $row['name'] ?>
                    </td>

                    <td class="manage-list__item-img" style="text-align: center;">
                    <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a> 
                    </td>
                            
                    <td class="manage-list__item-img" style="text-align: center;">
                        <?php echo $row['message'] ?>
                    </td>

                    <td class="manage-list__item-img" style="text-align: center;">
                        <?php echo $row['uploaded_on'] ?>
                    </td>
                    <td class="manage-list__item-img" style="text-align: center;">
                        <a href="#" id="btn-checked" ><ion-icon name="checkmark-outline"></ion-icon>Checked</a>
                    </td>
                    
                    

                </tr>

   <?php 
    }

        
        
    }

?>


