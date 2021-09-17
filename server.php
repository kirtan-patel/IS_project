<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
require 'config.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pass1 = mysqli_real_escape_string($con, $_POST['pass1']);
  $pass2 = mysqli_real_escape_string($con, $_POST['pass2']);
  $religion = mysqli_real_escape_string($con, $_POST['religion']);
  $Location1 = mysqli_real_escape_string($con, $_POST['location']);
  $mstatus = $_POST['mstatus'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $p_no = $_POST['phone_number'];


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) {
    array_push($errors, "FirstName is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($pass1)) {
    array_push($errors, "Password is required");
  }
  if ($pass1 != $pass2) {
    array_push($errors, "The two passwords do not match");
  }
  if (empty($lname)) {
    array_push($errors, "LastName is required");
  }
  if (empty($p_no)) {
    array_push($errors, "Phone number is required");
  }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `details` WHERE `Email`='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists

    if ($user['Email'] === $email) { // if user exists
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($pass1); //encrypt the password before saving in the database

    $query = "INSERT INTO `details`( `FirstName`, `LastName`, `Email`, `phone_no`,`Password`, `Type`,`Religion`,`location`,`mstatus`,`gender`) VALUES ('$fname','$lname','$email','$p_no','$password','$type','$religion','$Location1','$mstatus','$gender')";
    mysqli_query($con, $query);
    $_SESSION['username'] = $fname;
    $_SESSION['success'] = "You are now logged in";
    header('location:signup.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email1 = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($email1)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM `details` WHERE  `Email`='$email1' AND `Password`='$password' AND `isActive`=0 limit 1";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {

      $row = mysqli_fetch_assoc($results);
      if ($row['Type'] == 'landlord') {
        $_SESSION['id_landlord'] = $row['ID'];
        $_SESSION['username_landlord'] = $row['FirstName'];
        $tp = $row['Type'];
        $uname = $row['FirstName'];
        $_SESSION['success'] = "Hello " . $uname . " You are logged to landlord page as " . $tp;
        header("location:landlord/dashboard.php");
      } elseif ($row['Type'] == 'student') {
        $_SESSION['id'] = $row['ID'];
        $_SESSION['username'] = $row['FirstName'];
        $tp = $row['Type'];
        $uname = $row['FirstName'];
        $_SESSION['success'] = "Hello " . $uname . " You are logged to student page as " . $tp;
        header("location:student/dashboard.php");
      } else {
        $_SESSION['id_admin'] = $row['ID'];
        $_SESSION['username_admin'] = $row['FirstName'];
        $tp = $row['Type'];
        $uname = $row['FirstName'];
        $_SESSION['success'] = "Hello " . $uname . " You are logged to admin page as " . $tp;
        header("location:admin/dashboard.php");
      }
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if (isset($_POST['ch_pass'])) {
  $newpass = $_POST['change_pass'];
  $newpass1 = md5($newpass);
  $newid = $_SESSION['id'];
  $q = "UPDATE `details` set `Password`='$newpass1' where `ID`='$newid'";
  if (mysqli_query($con, $q)) {
    header("Location:login.php");
  }
}

?>
<?php
if (isset($_POST['submit_form'])) {
  sub_form();
}

function sub_form()
{
  require 'config.php';
  $name = $_POST['name_feed'];
  $mail = $_POST['email_feed'];
  $mess = $_POST['message_feed'];

  $user_check = "SELECT * FROM `details` WHERE `Email`='$mail'";
  $results = mysqli_query($con, $user_check);
  $user_check = mysqli_fetch_assoc($results);

  if ($user_check['Email'] === $mail) {
    $query_upload = "INSERT INTO `feedback`(`name`, `email`, `message`) VALUES ('$name','$mail','$mess')";
    mysqli_query($con, $query_upload);

?>
    <script>
      alert("Feedback send, thank you!");
    </script>

  <?php } else {
  ?>
    <script>
      alert("Looks like you are not registred, so you can not send a feedback");
    </script>

<?php
  }
}
?>