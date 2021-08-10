<?php 
   require 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration form</title>
</head>
<body>
    <form action="register.php" method="post">
        <?php echo include('errors.php')?>
    <div class="header">
        <h2>Register</h2>
    </div>
    <div class="input-group">
        <label for="">FirstName</label>
        <input type="text" name="fname">
    </div>
    <div class="input-group">
        <label for="">LastName</label>
        <input type="text" name="lname">
    </div>
    <div class="input-group">
        <label for="">Phone number</label>
        <input type="text" name="phone_number">
    </div>
    <div class="input-group">
        <label for="">Email</label>
        <input type="email" name="email">
    </div>
    <div class="input-group">
        <label for="">Password</label>
        <input type="password" name="pass1" >
    </div>
    <div class="input-group">
        <label for=""> Confirm Password</label>
        <input type="password" name="pass2" >
    </div>
    <div class="input-group">
    <label for="">Select type</label>
        <select name="type" id="sel">
            <option value="landlord">landlord</option>
            <option value="student">student</option>
        </select>
    </div>
    <div class="input-group">
        
        <input type="submit" name="reg_user" value="Register">
    </div>
    <div class="input-group">
        <label for="">already a user? <a href="login.php">Click here</a></label>
    </div>
    </form>
</body>
</html>