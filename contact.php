<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Dobro dosli u najbolji kafic na svetu">
    <meta name="keywords" content="Kafic">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style_contact.css">
    <title>Feedback Form</title>
</head>

<body>
    <?php include 'server.php' ?>
    <header>
        <nav id="navbar">
            <div class="container">
                <h1 class="logo"><a href="index.php">Student Accomodation System</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a class="current" href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section id="contact-form" class="py-3">
        <div class="container">
            <h1 class="l-heading"><span class="text-primary">Contact </span> Us</h1>
            <p>Please fill in all spots so you can contact us</p>
            <form action="contact.php" method="post">
                <div class="form-group">
                    <laber for="name">Name</laber>
                    <input type="text" name="name_feed" id="Name" required>
                </div>
                <div class="form-group">
                    <laber for="email">Email</laber>
                    <input type="email" name="email_feed" id="email" required>
                </div>
                <div class="form-group">
                    <laber for="message">Message</laber>
                    <textarea type="email" name="message_feed" id="message" required></textarea>
                </div>
                <input type="submit" class="btn" name="submit_form" value="Submit">
            </form>
        </div>
    </section>
    <section id="contact-info" class="bg-dark">
        <div class="container">
            <div class="box ">
                <i class="fas fa-hotel fa-3x"></i>
                <h3> Location</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
            <div class="box">
                <i class="fas fa-phone fa-3x"></i>
                <h3>Telephone Number</h3>
                <p>+2547849030</p>
            </div>
            <div class="box ">
                <i class="fas fa-envelope fa-3x"></i>
                <h3>Email Address</h3>
                <p>contact@SAS.com></p>
            </div>
        </div>

    </section>

</body>

</html>