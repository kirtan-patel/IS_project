<?php include('server.php')
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>
    <header class="top">
        <nav class="navbar">
            <a href="index.php" class="nav-logo">Student Accomodation System</a>
    
    
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" >Home</a></li>
                <li class="nav-item"><a href="login.php" >Log in</a></li>
                <li class="nav-item"><a href="signup.php" >Sign up</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>


        <form action="login.php" method="post">
            	
            <div class="loginbox">
                <h1>Log in</h1>
               <h4 class="error"> <?php include('errors.php'); ?></h4><br>
                <label for="Username"> Username</label>
                <input type="text" name="email" placeholder="Username" id="" required><br><br>
                <label for="Password">Password</label>
                <input type="Password" name="password" placeholder="Password" id="" required><br><br>
                <button type="submit" name="login_user" class="btn">Log in</button><br><br><br><br>
                Don't have an account? <a href="signup.php" class="signup">Register here</a>
        
            </div>
        
        </form>
        


    <div class="scrollup scroll">
        <p><a href="#top">Back to Top</a></p>
    </div>

    <script src="Script.js"></script>

</body>
</html>