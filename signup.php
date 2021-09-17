<?php include('server.php')


?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <style type="text/css">
        * {
            margin: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            background: linear-gradient(120deg, #2980b9, #8e44ad);

        }

        ul li {
            list-style: none;

        }

        li a {
            text-decoration: none;
            font-size: 16px;


        }


        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 5px 5px;
            height: 80px;

        }

        .nav-logo {
            padding: 10px 10px;
            text-decoration: none;
            color: white;
            font-size: 30px;
            background: none;
        }

        .nav-item a {
            color: white;
            background: none;
        }

        .nav-item {
            margin-left: 25px;
            padding: 10px;
            text-decoration: none;
            background: none;

        }

        .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }


        .hamburger {
            display: none;
            cursor: pointer;


        }

        .hamburger:hover {
            cursor: pointer;
        }

        .bar {
            display: block;
            height: 3px;
            width: 25px;
            background: none;
            color: white;
            margin: 5px;


        }

        .signup-box {
            position: absolute;
            background: white;
            top: 48%;
            left: 48%;
            transform: translate(-48%, -27%);
            color: #fff;
            width: 450px;
            height: fit-content;
            padding: 14px 40px;
            border-radius: 10px;
            box-sizing: border-box;
            margin-top: 50px;
            overflow: hidden;
            margin-bottom: 100px;

        }

        .signup-box h1 {
            background: white;
            color: black;
            text-align: center;
            font-size: 30px;
            padding: 15px;
            border-bottom: 1px solid silver;
        }

        .bar:hover {
            display: block;
            height: 3px;
            width: 25px;
            background: none;
            margin: 5px;
            cursor: pointer;

        }

        a {
            background: none;
            color: blue;
        }

        p {
            background: none;
            color: black;
        }

        @media only screen and (max-width: 768px) {
            .hamburger {
                display: block;
                cursor: pointer;
                background: none
            }

            ul {
                list-style-type: none;



            }

            ul li {
                display: inline;
                padding: 20px;

            }

            .bar {
                display: block;
                height: 3px;
                width: 25px;
                background: white;
                background-color: none;
                margin: 5px;


            }

            .bar:hover {
                display: block;
                height: 3px;
                width: 25px;
                background: white;
                margin: 5px;
                cursor: pointer;


            }


            .nav-logo {
                font-size: 20px;
            }

            .btn {
                border: none;
                outline: none;
                height: 40px;
                background: blue;
                color: #fff;
                font-size: 18px;
                border-radius: 5px;
                width: 200px;
                cursor: pointer;

            }

            .btn:hover {
                background: blue;
                transition: 0.5s ease-in-out;
                width: 200px;
            }

            .nav-menu {
                position: fixed;
                top: -110%;
                margin-top: 15%;
                flex-direction: column;
                color: white;
                width: 100%;
                text-align: center;
                transition: 0.7s ease-in-out;
                z-index: 10000;
                background: linear-gradient(120deg, #2980b9, #8e44ad);
            }

            .signup-box {
                position: absolute;
                background: white;
                top: 48%;
                left: 48%;
                transform: translate(-48%, -27%);
                color: #fff;
                width: 380px;
                height: fit-content;
                padding: 14px 40px;
                border-radius: 10px;
                box-sizing: border-box;
                margin-top: 50px;
                overflow: hidden;
                margin-bottom: 100px;

            }

            .nav-menu.active {
                top: 0;
            }

            .nav-item {
                margin: 1rem 0;
                border-bottom: 1px solid white;
                width: 120%;
                padding-bottom: 20px;

            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
                transition: 0.3s;
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);

            }
        }

        /* navbar end */

        h2 {
            text-align: center;
            text-decoration: underline;
            font-weight: bold;


        }

        form {
            margin-top: 15px;
            text-align: center;
            background: white;
        }

        label {
            color: black;
            background: none;
            marg
        }

        select {
            background: none;
            width: 100px;
        }

        h3 {
            text-align: right;
            line-height: 20px;
            color: white;
        }

        ul {
            list-style-type: none;
            background: none;


        }

        ul li {
            display: inline;
            padding: 20px;

        }



        .btn {
            border: none;
            outline: none;
            height: 40px;
            background: blue;
            width: 75px;
            color: #fff;
            font-size: 18px;
            border-radius: 5px;
            width: 275px;
            cursor: pointer;

        }

        .btn:hover {
            background: blue;
            transition: 0.5s ease-in-out;
            width: 280px;
        }

        .input {
            width: 50px;
            margin-top: 5px;
        }

        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number],
        input[type=Location],
        input[type=text] {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 5px;
            background: rgba(0, 0, 0, 0.10);
            outline: none;
            border: none;
            border-bottom: #18e018 dotted #fff;
            color: black;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;

        }

        .error {
            background: none;
        }



        /* form style end */
    </style>

</head>

<body>

    <header class="top">
        <nav class="navbar">
            <a href="index.php" class="nav-logo">Student Accomodation System</a>


            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="login.php">Log in</a></li>
                <li class="nav-item"><a href="signup.php">Sign up</a></li>
                <li class="nav-item"><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>




    <div class="signup-box">
        <h1>Sign-up</h1>



        <form class="form-signup" action="signup.php" method="post">
            <h4 class="error" style="color:red;"> <?php include('errors.php'); ?></h4><br>
            <label for="Firstname">Firstname:</label>
            <input type="text" placeholder="Firstnname" name="fname" value=""><br><br>
            <label for="lastname">Lastname:</label>
            <input type="text" placeholder="Lastnname" name="lname" value=""><br><br>
            <label for="phone number">Phone number:</label>
            <input type="number" name="phone_number" placeholder="Phone number" value=""><br><br>
            <label for="email">Email:</label>
            <input type="email" placeholder="Email" name="email" value=""><br><br>
            <label for="password">Password:</label>
            <input type="Password" placeholder="Password" name="pass1" value=""><br><br>
            <label for="confirm password">Confirm Password:</label>
            <input type="Password" placeholder="Confirm password" name="pass2" value=""><br><br>
            <label for="religion">Religion:</label>
            <input type="text" placeholder="Religion" name="religion" value=""><br><br>
            <label for="religion">Previous hostel/location:</label>
            <input type="text" placeholder="Previous hostel/location" name="location" value=""><br><br>

            <label for="Gender">Gender: </label>
            <select name="gender" id="sel">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>
            <label for="User type">Martial status: </label>
            <select name="mstatus" id="sel">
                <option value="married">Married</option>
                <option value="single">Single</option>
            </select><br><br>
            <label for="User type">User type: </label>
            <select name="type" id="sel">
                <option value="student">Student</option>
                <option value="landlord">Landlord</option>
            </select><br><br>




            <button class="btn" type="submit" name="reg_user">Signup</button><br><br>
            <button class="btn" type="reset" name="reset">Reset</button><br><br>

            <p> Already have an account?</p> <a href="login.php" class="login">click here to log in</a>

        </form>



    </div>




    <script src="Script.js"></script>

</body>



</html>