<?php

if (isset($_POST['submit_update'])) {
    save_profile();
}

function save_profile()
{
    require 'config.php';
    $user_id = $_SESSION['id_landlord'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $about = $_POST['about'];


    $qu = "UPDATE `details` SET `FirstName`='$fname',`LastName`='$lname',`Email`='$email',`phone_no`='$phone',`about_me`='$about' WHERE `ID`='$user_id'";

    if (mysqli_query($con, $qu)) {
?>
        <script>
            window.alert("Profile updated, please login in back");
            window.location.href = "../login.php";
        </script>

<?php


    } else {
        echo "<script>alert('Something went wrong, try again')
                   </script>";
        header("Location:dashboard.php");
    }
}

?>

<?php

function getImageExt($imgtype)
{
    if (empty($imgtype))
        return false;
    switch ($imgtype) {
        case 'image/bmp':
            return '.bmp';
        case 'image/gif':
            return '.gif';
        case 'image/jfif':
            return '.jfif';
        case 'image/png':
            return '.png';
        case 'image/PNG':
            return '.PNG';
        case 'image/jpeg':
            return '.jpeg';
        case 'image/JPEG':
            return '.JPEG';
        case 'video/mp4':
            return '.mp4';
            break;
        default:
            return false;
    }
}

?>

<?php

if (isset($_POST['submit_property'])) {
    upload_hos();
}

function upload_hos()
{
    require 'config.php';
    $user_id = $_SESSION['id_landlord'];
    $hos_title = $_POST['title'];
    $hos_type = $_POST['hos_type'];
    $hos_price = $_POST['price'];
    $hos_des = $_POST['description'];
    $hos_location = $_POST['location'];
    $hos_fri_add = $_POST['address'];
    $hos_services = $_POST['services'];
    $hos_rul = $_POST['rules'];
    $bed_no = $_POST['bed_no'];
    $share_no = $_POST['share_no'];
    $hos_transport = $_POST['transport'];





    if (!empty($_FILES["feat_image"]["name"])) {
        $feat_file_name = $_FILES["feat_image"]["name"];
        $feat_temp_name = $_FILES["feat_image"]["tmp_name"];
        $feat_imgtype = $_FILES["feat_image"]["type"];
        $feat_ext = getImageExt($feat_imgtype);
        $feat_imagename = $hos_title . $feat_ext;
        $targetPathFeatImg = "images/uploads/" . $feat_imagename;

        if (move_uploaded_file($feat_temp_name, $targetPathFeatImg)) {




            $quer = "INSERT INTO `hos_details`(`agent_id`, `hos_name`, `hos_type`,`share_no`,`bed_no`, `price`, `description`, `ft_img`, `location`, `friendly_add`, `transport`,`services`, `rules`) VALUES ('$user_id','$hos_title','$hos_type','$share_no','$bed_no','$hos_price','$hos_des','$targetPathFeatImg','$hos_location','$hos_fri_add','$hos_transport','$hos_services','$hos_rul')";

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

    $query2 = "SELECT * FROM `hos_details` WHERE `agent_id`=$user_id ORDER BY `ID` DESC LIMIT 1";
    $run = mysqli_query($con, $query2);
    $row = mysqli_fetch_assoc($run);
    $propID = $row['ID'];

    if (!empty($_FILES["images"]["name"])) {
        for ($i = 0; $i < count($file_name = $_FILES["images"]["name"]); $i++) {
            $temp_name = $_FILES["images"]["tmp_name"][$i];
            $file_name = $_FILES["images"]["name"][$i];
            $imgtype = $_FILES["images"]["type"][$i];
            $ext = getImageExt($imgtype);
            $imagename = $hos_title . "_" . $file_name;
            $target_path = "images/uploads/" . $imagename;

            if (move_uploaded_file($temp_name, $target_path)) {
                $insert = "INSERT INTO `img_table`(`hos_id`, `more_img`) VALUES ('$propID','$target_path')";
                $query3 = mysqli_query($con, $insert);
                $query3;
            } //end for if move file
            else {
            ?>
                <script>
                    window.alert("oh no they is an issue moving multiple images, ensure extensions are correct");
                </script>
<?php  }
        } // end for forloop    

    } //end for multi image upload

}
?>

<?php
//this function is to populate hostels uploaded by the logged user
function all_hostel()
{
    require 'config.php';
    $query = "SELECT * FROM `hos_details` WHERE `isActive`= 0 AND `agent_active`=0 AND `agent_id` = '" . $_SESSION['id_landlord'] . "'  ORDER by `ID` DESC";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "None of your hostels are Approved Yet";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
?>
            <!--code for showing hostel -->
            <li class="manage-list__item">
                <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                        <a href="viewhostel.php?hosid=<?php echo $row['ID'] ?>">
                            <img src="<?php echo $row['ft_img'] ?>" alt="<?php echo $row['hos_name'] . ' image' ?>" width="170px" height="200px" class="img_edit">
                        </a>
                    </div>
                    <div class="manage-list__item-detail">
                        <h3 class="listing__title"><a href="viewhostel.php?hosid=<?php echo $row['ID'] ?>"><?php echo $row['hos_name']; ?></a></h3>
                        <p class="listing_location">
                            <ion-icon name="location-outline"></ion-icon>Location: <?php echo $row['location'] ?>
                        </p>
                        <p class="listing_price">
                            <ion-icon name="pricetag-outline"></ion-icon>Price: KSH <?php echo $row['price'] ?>
                        </p>
                        <p class="listing_price">
                            <ion-icon name="bed-outline"></ion-icon>Beds available <?php echo $row['bed_no'] ?>
                        </p>
                    </div>
                </div>
                <!--end for manage-list container -->
                <div class="manage-list__expire-date">
                    <!-- div for date -->
                    <?php echo $row['uploaded_on'] ?>
                </div>
                <!--end for date div -->

                <div class="manage-list__action">
                    <a href="update_hostel.php?edit_hostel=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a><br>
                    <a href="includes/remove_hostel.php?remove=<?php echo $row['ID'] ?>" class="remove" id="#"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>
                </div>

            </li>
            <!--end for li -->
<?php }
    }
}
?>

<!-- update password for landlord -->
<?php
if (isset($_POST['submit_new_password'])) {
    change_pass();
}
function change_pass()
{
    require 'config.php';
    $newpass = $_POST['newpassword'];
    $newpass1 = md5($newpass);
    $newid = $_SESSION['id_landlord'];
    $q = "UPDATE `details` set `Password`='$newpass1' where `ID`='$newid'";
    if (mysqli_query($con, $q)) {
?>
        <script>
            alert("Password has been updated, Login again!")
        </script>
    <?php
        header("Location:../login.php");
    } else
    ?>
    <script>
        alert("oppsii, we ran into a problem updating the password, kindly try again")
    </script>
<?php  }
?>

<!-- function to resubmit hostel -->
<?php
function resubmit_hostel()
{
    require 'config.php';
    $query = "SELECT * FROM `hos_details` WHERE `agent_active`= 1 AND `agent_id` = '" . $_SESSION['id_landlord'] . "'  ORDER by `ID` DESC";
    $query_run = mysqli_query($con, $query);
    $query_row = mysqli_num_rows($query_run);
    if ($query_row == 0) {
        echo "Nothing to resubmit here";
    } else {
        while ($row = mysqli_fetch_array($query_run)) {
?>
            <!--code for showing hostel -->
            <li class="manage-list__item">
                <div class="manage-list__item-container">
                    <div class="manage-list__item-img">
                        <a href="">
                            <img src="<?php echo $row['ft_img'] ?>" alt="<?php echo $row['hos_name'] . ' image' ?>" width="170px" height="200px">
                        </a>
                    </div>
                    <div class="manage-list__item-detail">
                        <h3 class="listing__title"><a href="#"><?php echo $row['hos_name']; ?></a></h3>
                        <p class="listing_location">Location: <?php echo $row['location'] ?></p>
                        <p class="listing_price">Price: KSH <?php echo $row['price'] ?></p>
                    </div>
                </div>
                <!--end for manage-list container -->
                <div class="manage-list__expire-date">
                    <!-- div for date -->
                    <?php echo $row['uploaded_on'] ?>
                </div>
                <!--end for date div -->

                <div class="manage-list__action">
                    <a href="includes/remove_hostel.php?add_back=<?php echo $row['ID'] ?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i>Add back</a>
                </div>

            </li>
            <!--end for li -->
<?php }
    }
}
?>

<!-- function to update edited hostel -->
<?php
if (isset($_POST["update_hostel"])) {
    update_hostel();
}

function update_hostel()
{

    require 'config.php';
    $hosid = $_POST['hos_id'];
    $hos_name = $_POST['title'];
    $hos_type = $_POST['hos_type'];
    $hos_price = $_POST['price'];
    $hos_des = $_POST['description'];
    $hos_loc = $_POST['location'];
    $hos_add = $_POST['address'];
    $hos_services = $_POST['services'];
    $hos_rule = $_POST['rules'];
    $hos_share_no = $_POST['share_no'];
    $hos_bed_no = $_POST['bed_no'];
    $hos_transport = $_POST['transport'];
    $query_update = "UPDATE `hos_details` set `hos_name`='$hos_name',`hos_type`='$hos_type',`share_no`='$hos_share_no',`bed_no`='$hos_bed_no',`price`='$hos_price',`description`='$hos_des',`location`='$hos_loc',`friendly_add`='$hos_add',`transport`='$hos_transport',`services`='$hos_services',`rules`='$hos_rule' where `ID`='$hosid'";
    $query3 = mysqli_query($con, $query_update);
    if ($query3) {
        echo '<script>alert("Hostel has been updated!")
            window.location.href = "my_hostel.php"; </script>';
    } else {
        echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
    }
}

?>

<?php


if (isset($_POST['accept-btn'])) {
    require 'config.php';
    require_once('../PHPMailer/PHPMailerAutoload.php');
    $contact_id = $_POST['contact_id'];
    $hostel_id = $_POST['hostel_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $up_query = "UPDATE `contact` set `checked`='checked' where `ID`='$contact_id'";
    $up_run = mysqli_query($con, $up_query);


    //query to bring details from the selected hostel and minus the bed availability

    $minus_query = "SELECT * from `hos_details` where ID = '$hostel_id'";
    $run_minus_query = mysqli_query($con, $minus_query);
    $roww = mysqli_fetch_assoc($run_minus_query);
    $bed_number = $roww['bed_no'];
    if ($bed_number > 0) {
        $minus_by = 1;
        $bed_number = bcsub($bed_number, $minus_by);
        $update_newbed = "UPDATE `hos_details` set `bed_no`='$bed_number' where `ID`='$hostel_id' ";
        if ($run_nedbed_query = mysqli_query($con, $update_newbed)) {
?>
            <script>
                window.alert("One bed has been removed")
            </script>

        <?php
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = 'example.ISproject@gmail.com';
            $mail->Password = 'example.ISproject';
            $mail->setFrom('no-reply@gmail.com');

            //message
            $mail->Subject = 'Acommodation system';
            $mail->Body = 'Hello ' . $name . ' Congratulations! your room for your choosen hostel has been booked, we look forward to host you! ';

            $mail->addAddress($email);
            $mail->send();
        } //end for $run_nedbed
    } else {
        ?>
        <script>
            window.alert("They are no available beds for this hostel");
        </script>

        <?php   }
}
function pop_contact()
{
    require 'config.php';
    $land_id = $_SESSION['id_landlord'];
    $query4 = "SELECT * from `contact` where `agent_id`='$land_id' and `checked`='pending'";
    $query_run4 = mysqli_query($con, $query4);
    $query_row4 = mysqli_num_rows($query_run4);


    if ($query_row4 == 0) {
        echo "No contacts made yet";
    } else {
        while ($row = mysqli_fetch_array($query_run4)) {
            $hosid = $row['hos_id'];
            $query5 = "SELECT * from `hos_details` where `ID`='$hosid'";
            $query_run5 = mysqli_query($con, $query5);
            $fetch = mysqli_fetch_assoc($query_run5);


        ?>


            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Name </h4>
                    <div class="property__form-field"><?php echo $row['name'] ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Email </h4>
                    <div class="property__form-field">

                        <a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Phone </h4>
                    <div class="property__form-field">
                        <a href="tel:+<?php echo $row['phone_no'] ?>"><?php echo $row['phone_no'] ?></a>
                    </div>
                    <div class="property__form-wrapper">
                        <h4>Hostel Name </h4>
                        <div class="property__form-field">
                            <a href="viewhostel.php?hosid=<?php echo $fetch['ID'] ?>"><?php echo $fetch['hos_name']; ?> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="property__form-wrapper">
                    <h4>Message </h4>
                    <div class="property__form-field">
                        <?php echo $row['message'] ?>
                    </div>
                    <div class="property__form-wrapper">
                        <h4>Start Staying from </h4>
                        <div class="property__form-field">
                            <?php echo $row['start_stay'] ?>
                        </div>
                    </div>
                </div>

            </div><!-- .property__form-wrapper -->
            <form action="viewContact.php" method="post">

                <input type="submit" name="accept-btn" value="Accept" class="accept-btn">
                <input type="hidden" name="contact_id" value="<?php echo $row['ID']; ?>">
                <input type="hidden" name="hostel_id" value="<?php echo $fetch['ID']; ?>">
                <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                <input type="hidden" name="name" value="<?php echo $row['name'] ?>">

            </form>


            Contact ID <?php echo $row['ID']; ?>

            <hr style="background-color:red;">
<?php      }
    }
}

?>