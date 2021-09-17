<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .background-image {
            height: 100vh;
            width: 100%;
            background: url("bimg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            filter: brightness(70%);

        }

        .btn1 {
            border: none;
            outline: none;
            padding: 15px;
            margin-top: 75px;
            border-radius: 4px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
        }

        .background-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        @media only screen and (max-width:767px) {
            body {
                width: 100%;
            }

            .background-image {
                height: 66.67;
                width: 100%;
            }

            .btn1 {
                border: none;
                outline: none;
                padding: 15px;
                margin-top: 75px;
                border-radius: 4px;
                color: white;
                font-size: 18px;
                cursor: pointer;
                background: linear-gradient(to top, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
            }

            a {
                background: none;
            }

            .background-text {
                text-align: center;
                position: absolute;
                top: 50%;
                left: 37.5%;
                transform: translate(-50%, -50%);
                color: white;
            }

            .h1 {
                font-size: 25px;
                background: none;
            }

            .h4 {
                background: none;
            }

            .nav-logo {
                font-size: 20px
            }
        }

        a.click {
            background: none
        }

        @media only screen and (max-width:991px) {
            body {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header class="top">
        <nav class="navbar">
            <a href="index.php" class="nav-logo">Student Accomodation System</a>

            <ul class="nav-menu">
                <li class="nav-item"><a href="">Home</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Log in</a></li>
                <li class="nav-item"><a href="signup.php">Sign up</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <div class="background-image">
        <div class="background-text fade fadeOut">
            <h1 style="font-size:50px; background:none; " class="h1">Looking for an hostel?</h1><br>
            <h4 style=" background:none;">Click below to log in to the sytem to choose the hostel of your choice! </h4>
            <a href="login.php" class="click"><button class="btn1"> click here</button></a>
        </div>
    </div>
    <section id="home-info" class="bg-dark">
        <div class="info-img"></div>
        <div class="info-content">
            <h2 class="h2-tag"><span class="text-primary">Feedback</span> form</h2>
            <p>
                We care about our customers and look forward to make you happy.
                So if you have any issue contact us using the form below and we will
                try our best to solve them.
            </p>
            <a href="contact.php" class="read" style="color: whitesmoke;">Feedback Form</a>
        </div>
    </section>





    <script src="Script.js"></script>

</body>
<!-- script for review slide -->


</html>