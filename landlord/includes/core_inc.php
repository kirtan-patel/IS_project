<?php

    if (isset($_POST['submit_update'])) {
        save_profile();
    }

    function save_profile(){
        require 'config.php';
        $user_id=$_SESSION['id_landlord'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $about=$_POST['about'];
        

        $qu="UPDATE `details` SET `FirstName`='$fname',`LastName`='$lname',`Email`='$email',`phone_no`='$phone',`about_me`='$about' WHERE `ID`='$user_id'";
        
        if (mysqli_query($con,$qu)) {
            header("Location:../login.php");
            
            
        }else{
            echo "<script>alert('Something went wrong, try again')
                   </script>";
            header("Location:dashboard.php");
            
        }

    }

?>

<?php 

    function getImageExt($imgtype){
        if(empty($imgtype))
            return false;
        switch($imgtype){
            case 'image/bmp': return '.bmp';
            case 'image/gif': return '.gif';
            case 'image/jfif': return '.jfif';
            case 'image/png': return '.png';
            case 'image/PNG': return '.PNG';
            case 'image/jpeg': return '.jpeg';
            case 'image/JPEG': return '.JPEG';
            case 'video/mp4': return '.mp4';
                break;
            default: return false;
        }
    }

?>

<?php 

if (isset($_POST['submit_property'])) {
    upload_hos();
}

function upload_hos(){
    require 'config.php';
    $user_id=$_SESSION['id_landlord'];
    $hos_title=$_POST['title'];
    $hos_type=$_POST['hos_type'];
    $hos_price=$_POST['price'];
    $hos_des=$_POST['description'];
    $hos_location=$_POST['location'];
    $hos_fri_add=$_POST['address'];
    $hos_services=$_POST['services'];
    $hos_rul=$_POST['rules'];

    



if (!empty($_FILES["feat_image"]["name"])) {
    $feat_file_name = $_FILES["feat_image"]["name"];
    $feat_temp_name = $_FILES["feat_image"]["tmp_name"];
    $feat_imgtype = $_FILES["feat_image"]["type"];
    $feat_ext = getImageExt($feat_imgtype);
    $feat_imagename = $hos_title . $feat_ext;
    $targetPathFeatImg = "images/uploads/" . $feat_imagename;

    if (move_uploaded_file($feat_temp_name, $targetPathFeatImg)) {
        

          

          $quer="INSERT INTO `hos_details`(`agent_id`, `hos_name`, `hos_type`, `price`, `description`, `ft_img`, `location`, `friendly_add`, `services`, `rules`) VALUES ('$user_id','$hos_title','$hos_type','$hos_price','$hos_des','$targetPathFeatImg','$hos_location','$hos_fri_add','$hos_services','$hos_rul')";

            if ($query_run = mysqli_query($con, $quer)) {
                

                
                    ?><script>
                        window.alert('Hostel Submitted Successfully, Wait For Approval');
                        
                    </script>
                    <?php } else {
                    ?>
                    <script>
                        window.alert('Opps! Something Went Wrong, check your inputs again');
                        
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    window.alert('Opps! Something Went Wrong In Uploading Image to Server');
                    
                </script>
                <?php
            }
        }

        $query2="SELECT * FROM `hos_details` WHERE `agent_id`=$user_id ORDER BY `ID` DESC LIMIT 1";
        $run=mysqli_query($con,$query2);
        $row=mysqli_fetch_assoc($run);
        $propID=$row['ID'];

        if (!empty($_FILES["images"]["name"])) {
            for ($i=0; $i < count($file_name=$_FILES["images"]["name"]); $i++) { 
                $temp_name=$_FILES["images"]["tmp_name"][$i];
                $file_name=$_FILES["images"]["name"][$i];
                $imgtype=$_FILES["images"]["type"][$i];
                $ext=getImageExt($imgtype);
                $imagename=$hos_title."_".$file_name;
                $target_path="images/uploads/".$imagename;

                if (move_uploaded_file($temp_name,$target_path)) {
                    $insert="INSERT INTO `img_table`(`hos_id`, `more_img`) VALUES ('$propID','$target_path')";
                    $query3=mysqli_query($con,$insert);
                    $query3;

                }//end for if move file
                else {
                    ?>  
                        <script>
                            window.alert("oh no they is an issue moving multiple images, ensure extensions are correct");
                        </script>
              <?php  }

            }// end for forloop    

        } //end for multi image upload

}
?>

<?php 
//this function is to populate hostels uploaded by the logged user
    function all_hostel(){
        require 'config.php';
        $query = "SELECT * FROM `hos_details` WHERE `isActive`= 0 AND `agent_active`=0 AND `agent_id` = '" . $_SESSION['id_landlord'] . "'  ORDER by `ID` DESC";
        $query_run = mysqli_query($con, $query);
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 0) {
            echo "None of your hostels are Approved Yet";
        }else {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <!--code for showing hostel -->
                <li class="manage-list__item">
                    <div class="manage-list__item-container">
                        <div class="manage-list__item-img">
                            <a href="">
                                <img src="<?php echo $row['ft_img'] ?>" alt="<?php echo $row['hos_name'].' image' ?>" width="170px" height="200px">
                            </a>
                        </div>
                        <div class="manage-list__item-detail">
                            <h3 class="listing__title"><a href="#"><?php echo $row['hos_name']; ?></a></h3>
                            <p class="listing_location">Location: <?php echo $row['location'] ?></p>
                            <p class="listing_price">Price: KSH <?php echo $row['price'] ?></p>
                        </div>
                    </div><!--end for manage-list container -->
                    <div class="manage-list__expire-date"><!-- div for date -->
                        <?php echo $row['uploaded_on'] ?>
                    </div><!--end for date div -->

                    <div class="manage-list__action">
                        <a href="update_hostel.php?edit_hostel=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><br>
                        <a href="includes/remove_hostel.php?remove=<?php echo $row['ID'] ?>" class="remove" id="#"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>
                    </div>

                </li><!--end for li -->
           <?php }
        }
    }
    ?>

    <!-- update password for landlord -->
    <?php 
    if (isset($_POST['submit_new_password'])) {
        change_pass();
    }
    function change_pass(){
        require 'config.php';
        $newpass=$_POST['newpassword'];
        $newpass1=md5($newpass);
        $newid=$_SESSION['id_landlord'];
        $q="UPDATE `details` set `Password`='$newpass1' where `ID`='$newid'";
        if (mysqli_query($con,$q)) {
            ?>
            <script>
                alert("Password has been updated, Login again!")
            </script>
        <?php
      header("Location:../login.php");
  }else
  ?> 
    <script>
        alert("oppsii, we ran into a problem updating the password, kindly try again")
    </script>
  <?php  }
   ?>

<!-- function to resubmit hostel -->
<?php 
    function resubmit_hostel(){
        require 'config.php';
        $query = "SELECT * FROM `hos_details` WHERE `agent_active`= 1 AND `agent_id` = '" . $_SESSION['id_landlord'] . "'  ORDER by `ID` DESC";
        $query_run = mysqli_query($con, $query);
        $query_row = mysqli_num_rows($query_run);
        if ($query_row == 0) {
            echo "Nothing to resubmit here";
        }else {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <!--code for showing hostel -->
                <li class="manage-list__item">
                    <div class="manage-list__item-container">
                        <div class="manage-list__item-img">
                            <a href="">
                                <img src="<?php echo $row['ft_img'] ?>" alt="<?php echo $row['hos_name'].' image' ?>" width="170px" height="200px">
                            </a>
                        </div>
                        <div class="manage-list__item-detail">
                            <h3 class="listing__title"><a href="#"><?php echo $row['hos_name']; ?></a></h3>
                            <p class="listing_location">Location: <?php echo $row['location'] ?></p>
                            <p class="listing_price">Price: KSH <?php echo $row['price'] ?></p>
                        </div>
                    </div><!--end for manage-list container -->
                    <div class="manage-list__expire-date"><!-- div for date -->
                        <?php echo $row['uploaded_on'] ?>
                    </div><!--end for date div -->

                    <div class="manage-list__action">
                        <a href="includes/remove_hostel.php?add_back=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i>Add back</a>
                    </div>

                </li><!--end for li -->
           <?php }
        }
    }
    ?>

    <!-- function to update edited hostel -->
    <?php 
    if (isset($_POST["update_hostel"])) {
        update_hostel();
    }
    
    function update_hostel(){

        require 'config.php';
        $hosid=$_POST['hos_id'];
        $hos_name=$_POST['title'];
        $hos_type=$_POST['hos_type'];
        $hos_price=$_POST['price'];
        $hos_des=$_POST['description'];
        $hos_loc=$_POST['location'];
        $hos_add=$_POST['address'];
        $hos_services=$_POST['services'];
        $hos_rule=$_POST['rules'];
        $query_update="UPDATE `hos_details` set `hos_name`='$hos_name',`hos_type`='$hos_type',`price`='$hos_price',`description`='$hos_des',`location`='$hos_loc',`friendly_add`='$hos_add',`services`='$hos_services',`rules`='$hos_rule' where `ID`='$hosid'";
        $query3=mysqli_query($con,$query_update);
        if ($query3) {
            echo '<script>alert("Hostel has been updated!")
            window.location.href = "my_hostel.php"; </script>';
        }else{
            echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
        }
    }
    
    ?>

    <?php 
        function pop_contact(){
            ?>
            <div class="col-sm-6">
            <div class="property__form-wrapper">
                <h4>Name </h4>
                <div class="property__form-field">Kirtan
                </div>
            </div>
        </div>  
        <div class="col-sm-6">
            <div class="property__form-wrapper"> 
                <h4>Email </h4>
                <div class="property__form-field">
                    <a href="mailto:">Kirtan@gmail.com</a> 
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="property__form-wrapper"> 
                <h4>Phone </h4>
                <div class="property__form-field">
                  <a href="tel:+">0788998892</a>  
                </div>
            </div>
        </div>   
        <div class="col-sm-6">
            <div class="property__form-wrapper">
                <h4>Message </h4>
                <div class="property__form-field">
                    Nice place i want to stay
                    <div> 
                </div>            
            </div>
        </div>
        </div><!-- .property__form-wrapper -->

        Contact
        <hr style="background-color:red;">
        <?php
        }
    
    ?>





      

