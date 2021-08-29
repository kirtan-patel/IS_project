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

<?php 

     if (isset($_POST['submit_contact_far'])) {
         emailfor_far();
     }
        function emailfor_far(){
            require_once ('../../PHPMailer/PHPMailerAutoload.php');
            require 'config.php';
            $name=$_POST['name'];
            $Email=$_POST['Email'];
            $hos_id=$_POST['hostel_id'];
            $query="SELECT `transport` from `hos_details` where `ID`='$hos_id'";
            $run_query=mysqli_query($con,$query);
            $result=mysqli_fetch_assoc($run_query);
            $message=$result['transport'];
            
     if (!empty($Email)) {
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure= 'ssl';
        $mail->Host='smtp.gmail.com';
        $mail->Port='465';
        $mail->isHTML();
        $mail->Username='example.ISproject@gmail.com';
        $mail->Password='example.ISproject';
        $mail->setFrom('no-reply@gmail.com');

        //message
        $mail->Subject='Acommodation system';
        $mail->Body='Hello '.$name.' This is regarding your recent feedback on the hostel you liked, we had asked the owner if they provide transportaion and this is what they said: '.$message;

        $mail->addAddress($Email);
        $mail->send();
        ?>
                    <script>
                        window.alert('Feedback received');
                        window.location.href="../viewhostel.php";
                    </script>

   <?php  }else{
          ?>
                    <script>
                        window.alert('Oh no, looks like email is not correct');
                        window.location.href="../viewhostel.php";
                    </script>
   
<?php }
        

        }

?>


<!-- code for intrested but expensive -->
<?php 

     if (isset($_POST['submit_contact_expensive'])) {
        emailfor_expensive();
     }
        function emailfor_expensive(){
            require_once ('../../PHPMailer/PHPMailerAutoload.php');
            require 'config.php';
            $name=$_POST['name'];
            $Email=$_POST['Email'];
            
     if (!empty($Email)) {
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure= 'ssl';
        $mail->Host='smtp.gmail.com';
        $mail->Port='465';
        $mail->isHTML();
        $mail->Username='example.ISproject@gmail.com';
        $mail->Password='example.ISproject';
        $mail->setFrom('no-reply@gmail.com');

        //message
        $mail->Subject='Accommodation system';
        $mail->Body='Hello '.$name.' Looks like you were intrested in my hostel but found it expensive but we have other hostels maybe look into that';

        $mail->addAddress($Email);
        $mail->send();
        ?>
                    <script>
                        window.alert('Feedback received');
                        window.location.href="../viewhostel.php";
                    </script>

   <?php  }else{
          ?>
                    <script>
                        window.alert('Oh no, looks like email is not correct');
                        window.location.href="../viewhostel.php";
                        
                    </script>
   
<?php }
        

        }

?>
        