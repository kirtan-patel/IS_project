<?php 

if (isset($_POST['submit_contact_form'])) {
    submit_contact_form();
}

function submit_contact_form(){
    require 'config.php';

    $hostelid=$_POST['hostel_id'];
    $agent_for_id=$_POST['id_for_agent'];
    $name=$_POST['name'];
    $Email=$_POST['Email'];
    $phonenumber=$_POST['phonenumber'];
    $message=$_POST['comment'];
    $date=$_POST['date'];
          
 
                 
                 $quer="INSERT INTO `contact` (`agent_id`, `hos_id`, `name`, `email`, `phone_no`, `message`, `start_stay`) VALUES ('$agent_for_id','$hostelid','$name','$Email','$phonenumber','$message','$date')";

            if (mysqli_query($con, $quer)) {
                    ?><script>
                        window.alert('message submitted ');
                        window.location.href="../dashboard.php";
                        
                    </script>
                    <?php } else {
                    ?>
                    <script>
                        window.alert('Opps! Something Went Wrong, check your inputs again');
                        
                    </script>
                    <?php
                }
            } 
        ?>
        