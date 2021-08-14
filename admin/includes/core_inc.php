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

                <tr class="manage-list__item-container">
                     <td><?php echo $i++; ?></td>
                     <td class="manage-list__item-img">
                       <a href="viewhostel.php?hosid=<?php echo$row['ID'] ?>"> <img src="<?php echo "../landlord/".$row['ft_img']; ?>" alt="<?php echo $row['hos_name']." Image" ?>" class="listing__img" width="400px" height="200px"></a>
                    </td>
                                        
                    <td class="manage-list__item-detail">
                        <h4 class="blog"><a href="viewhostel.php?hosid=<?php echo$row['ID'] ?>"><?php echo $row['hos_name'] ?></a></h4>
                        <p class="listing__location"><i class="fa fa-building"></i> <?php echo $row['location'] ?></p>
                        <p class="listing__price"><i class="fa fa-money"></i> KSH: <?php echo $row['price'] ?>/month</p>
                        <p class="listing__price"><i class="fa fa-list"></i> Rules: <?php echo $row['rules'] ?></p>
                        <p class="listing__price"><i class="fa fa-list"></i> Room type: <?php echo $row['hos_type'] ?></p>
                        <p class="property__details-item"><span class="property__details-item--cat"> Services: <?php echo $row['services'] ?></span></p>
                    </td>

                    <td class="manage-list__expire-date"><?php echo $row['uploaded_on'] ?></td>

                    
                    <td class="manage-list__action">
                        
                        <a href="includes/approve_hostel.php?status=<?php echo$row['ID'] ?>" class="btn btn-success btn-sm" >Approve</a>
            	    </td>
                    

                </tr>

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

                <tr class="manage-list__item-container">
                     <td><?php echo $i++; ?></td>
                     <td class="manage-list__item-img">
                        <img src="<?php echo "../landlord/".$row['ft_img']; ?>" alt="<?php echo $row['hos_name']." Image" ?>" class="listing__img" width="400px" height="200px">
                    </td>
                                        
                    <td class="manage-list__item-detail">
                        <h4 class="blog"><a href="#"><?php echo $row['hos_name'] ?></a></h4>
                        <p class="listing__location"><i class="fa fa-building"></i> <?php echo $row['location'] ?></p>
                        <p class="listing__price"><i class="fa fa-money"></i> KSH: <?php echo $row['price'] ?>/month</p>
                        <p class="listing__price"><i class="fa fa-list"></i> Rules: <?php echo $row['rules'] ?></p>
                        <p class="listing__price"><i class="fa fa-list"></i> Room type: <?php echo $row['hos_type'] ?></p>
                        <p class="property__details-item"><span class="property__details-item--cat"> Services: <?php echo $row['services'] ?></span></p>
                    </td>

                    <td class="manage-list__expire-date"><?php echo $row['uploaded_on'] ?></td>

                    
                    <td class="manage-list__action">

                        <a href="includes/approve_hostel.php?disapprove=<?php echo$row['ID'] ?>" class="btn btn-danger btn-sm" >Disapprove</a>
                        <a href="includes/approve_hostel.php?owner=<?php echo$row['agent_id'] ?>" class="btn btn-success btn-sm" >Check out owner</a>
            	    </td>
                    

                </tr>

       <?php }
    }
?>