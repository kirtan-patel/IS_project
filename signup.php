
<?php include('server.php')
    

    ?>
    <!doctype html>
    <html>
    
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <style type="text/css">
    *{
        margin:0;
        box-sizing: border-box;
        scroll-behavior: smooth;
    
    }
    
    ul li {
        list-style: none;
       
    }
     li a{
         text-decoration:none;
         font-size: 16px;
     }
     .navbar{
        display:flex;
        align-items: center;
        justify-content: space-around;
        padding: 5px 5px;
        height: 80px;
        background-color: salmon;
     }
    .nav-logo{
        padding: 10px 10px;
        text-decoration: none;
        color: blue;
        font-size: 30px;
    }
    
    .nav-item{
        margin-left:25px;
        padding:10px;
        text-decoration: none;
    }
    
    .nav-item a{
        color: white;
    }
    
    .nav-menu{
        display: flex;
        justify-content: space-between;
        align-items: center;
    
    }
    .nav-link a{
        color:white;
    }
    .nav-link{
        margin-left: auto;
        padding: 15px;
        font-size: 16px;
        background-color: blue;
        color:white;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .nav-link:hover{
        font-size: 16px;
        color: white;
        border-radius: 5px;
        padding: 17px;
        transition: 0.3s ease-in-out;
        
    }
    
    .hamburger{
        display: none;
        cursor:pointer;
       
    }
    
    .hamburger:hover{
        cursor:pointer;
    } 
    
    .bar{
       display:block;
       height: 3px;
       width:25px;
       background-color: black;
       margin: 5px;
       
    }
    
    .bar:hover{
       display:block;
       height: 3px;
       width:25px;
       background-color: black;
       margin: 5px;
       cursor:pointer;
       
    
    }
    @media only screen and (max-width: 768px){
        .hamburger{
            display: block;
            cursor: pointer;
        }
        .nav-menu{
            position: fixed;
            top:-100%;
            margin-top:15%;
            flex-direction: column;
            background-color:salmon;
            color:white;
            width: 100%;
            text-align: center;
            transition: 0.7s ease-in-out;
            z-index: 10000;
        
            
        }
                .nav-logo{
                font-size:20px;
            }
             .btn {
                border: none;
                outline: none;
                height: 40px;
                background: blue;
                color: #fff;
                font-size: 18px;
                border-radius: 20px;
                width: 200px;
                cursor: pointer;
    
            }
    
            .btn:hover {
                background: blue;
                transition: 0.5s ease-in-out;
                width:200px;
            }
    
        .nav-menu.active {
            top: 0;
        }
    
            .nav-item {
            margin: 1rem 0;
            border-bottom: 1px solid white;
            width:120%;
            padding-bottom:20px;
             
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
                text-align: center;
            }
            .login{
            text-decoration: underline;
            color:blue;
            }
            .login:visited{
            text-decoration: underline;
            color: blue;
            }
            h3 {
                text-align: right;
                line-height: 20px;
                color: white;
            }
    
            ul {
                list-style-type: none;
    
            }
    
            ul li {
                display: inline;
                padding: 20px;
    
            }
    
            .signup-box {
                position: absolute;
                background: rgb(218, 181, 213);
                top: 50%;
                left: 48%;
                transform: translate(-48%, -27%);
                color: #fff;
                width: 350px;
                height:fit-content;
                padding: 14px 40px;
                border-radius: 30px;
                box-sizing: border-box;
                margin-top:50px;
                overflow: hidden;
                margin-bottom:100px;
    
            }
            .signup-box h1{
                text-align: center;
                font-size: 30px;
                padding: 15px;
                border-bottom: 1px solid silver;
            }
            
    
            .btn {
                border: none;
                outline: none;
                height: 40px;
                background: blue;
                width:75px;
                color: #fff;
                font-size: 18px;
                border-radius: 20px;
                width: 275px;
                cursor: pointer;
    
            }
    
            .btn:hover {
                background: blue;
                transition: 0.5s ease-in-out;
                width:300px;
            }
    
            .input {
                width: 50px
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
                color: #fff;
                border-radius: 5px;
                margin: 5px;
                font-weight: bold;
    
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
    
    
    
    
        <div class="signup-box">
            <h1>Sign-up</h1>
    
          
    
          <form class="form-signup" action="signup.php" method="post">
              <?php include('errors.php'); ?>
                Firstname:<input type="text" placeholder="Firstnname" name="fname" value=""><br><br>
                Lastname:<input type="text" placeholder="Lastnname" name="lname" value=""><br><br>
                Phone number: <input type="number" name="phone_number" placeholder="Phone number" value=""><br><br>
                Email:<input type="email" placeholder="Email" name="email" value=""><br><br>
                Password:<input type="Password" placeholder="Password" name="pass1" value=""><br><br>
                Confirm Password:<input type="Password" placeholder="Confirm password" name="pass2" value=""><br><br>
                User type: <select name="type" id="sel">
                    <option value="Student">Student</option>
                    <option value="landlord">Landlord</option>
                </select><br><br>
    
    
    
                <button class="btn" type="submit" name="reg_user">Signup</button><br><br>
                <button class="btn" type="reset" name="reset">Reset</button><br><br>
    
                Already have an account? <a href="login.php" class="login">click here to log in</a>
                
            </form>
    
    
    
        </div>
    
    
    
    
        <script src="Script.js"></script>
    
    </body>
    
    
    
    </html>