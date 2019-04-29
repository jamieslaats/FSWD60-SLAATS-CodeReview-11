<?php

ob_start();
session_start(); // start a new session or continues the previous

if(isset($_SESSION['User']) || isset($_SESSION['Admin'])){
    header("Location: home.php");  //redirects to home.php
}


include_once 'actions/db_connect.php';


$Firstname = "";
$Surname = "";
$Email = "";
$pass = "";
$emailError = "";
$passError = "";
$error = false;


if ( isset($_POST['btn-signup']) ) {
    // sanitize user input to prevent sql injection
 $Firstname = trim($_POST['Firstname']); //trim - strips whitespace (or other characters) from the beginning and end of a string
 $Firstname = strip_tags($Firstname); // strip_tags — strips HTML and PHP tags from a string
 $Firstname = htmlspecialchars($Firstname); // htmlspecialchars converts special characters to HTML entities

 $Surname = trim($_POST['Surname']); //trim - strips whitespace (or other characters) from the beginning and end of a string
 $Surname = strip_tags($Surname); // strip_tags — strips HTML and PHP tags from a string
 $Surname = htmlspecialchars($Surname); // htmlspecialchars converts special characters to HTML entities
 
 $Email = trim($_POST['Email']);
 $Email = strip_tags($Email);
 $Email = htmlspecialchars($Email);

 $Password = trim($_POST['Password']);
 $Password = strip_tags($Password);
 $Password = htmlspecialchars($Password);

 
 //basic email validation
 if ( !filter_var($Email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
} else {
  // checks whether the email exists or not
  $sql = "SELECT Email FROM userdata WHERE Email ='$Email'";
  $result = mysqli_query($connect, $sql);
  $count = mysqli_num_rows($result);
  
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
}
}
 // password validation
if (empty($Password)){
  $error = true;
  $passError = "Please enter password.";
} else if(strlen($Password) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
}

// password hashing for security
$pass = hash('sha256', $Password);


 // if there's no error, continue to login
if (!$error) {

    $sql = "INSERT INTO userdata(Firstname,Surname,Email,Password) VALUES ('$Firstname','$Surname','$Email','$pass')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
     $errTyp = "Success";
     $errMSG = "Successfully registered, you may login now";
     unset($Firstname);
     unset($Surname);
     unset($Email);
     unset($Password);
 
 } else {
     $errTyp = "danger";
     $errMSG = "Something went wrong, try again later...";
 }
 
}
}
?>


<!DOCTYPE html5>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Happy Feet Travel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/homepage.css">
    <link rel="icon" href="favicon.ico?" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<!---BEGINNING OF BODY SECTION --->

<body>
    <div class="container">
        <header id="header">
            <div class="header">
                <img class="center-block" src="IMG/happyfeetlogo.png">
            </div>
        </header><!-- /header -->
        <nav class="navbar navcolour navbar-justify">
            <ul class="nav nav-pills nav-justified" id="navstyling">
                <li class="nav-item"><a href="index.php" title="About">Home</a></li>
                <li class="nav-item"><a href="#about" title="About">About</a></li>
                <li class="nav-item"><a href="index.php" title="Register">Register</a></li>
                <li class="nav-item"><a href="login.php" title="Login">Login</a></li>
                <li class="nav-item"><a href="#contact" title="Contact">Contact</a></li>
            </ul>
        </nav>
        <main>
            <!---Start of Jumbotron Section --->
            <div class="jumbotron">
                <h1 class="card-title"><strong>
                    <center>Welcome to Happy Feet <br> Travel Blog</center>
                </strong></h1>
                <!---Start of Carousel for Pictures--->
                
                <!--End of Controls for Carousel-->
                <h3 class="card-title">
                    <center>In order to enjoy the great content which will keep your feet desiring to be happy, please register below:<center>
                    </h3>
                </div>
                <!---END OF JUMBOTRON SECTION --->
                <!---START OF THE REGISTRATION SECTION --->
                <div class="fluid-container mt-2" id="introduction">
                    <div class="jumbotron">
                        <form class="formregistration" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" accept-charset="utf-8">
                            <h2 class="regformlettering">Registration Form:</h2><br/>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label id="regformlettering">First Name</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control" type="text" name="Firstname" placeholder="Eg. Johnny" value="<?= $Firstname ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label id="regformlettering">Last Name</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control" type="text" name="Surname" placeholder="Eg. Cash" value="<?= $Surname ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label id="regformlettering">Email Address</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control" type="text" name="Email" placeholder="Eg. Johnny@johnny.co" value="<?= $Email ?>">
                                    <span class="text-danger"><?php echo $emailError ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label id="regformlettering">Password</label>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input class="form-control" type="text" name="Password" placeholder="Eg. Q@57ty*%hf" value="<?= $pass ?>">
                                    <span class="text-danger"><?php echo $passError ?></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div id="regformlettering" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button id="loginbtn" class="btn btn-lg btn-block" name="btn-signup" type="submit">Submit Registration Details</button>
                                    <br>
                                </div >
                                <a href="login.php"><center>Sign In Here... </center></a>                               
                            </div>
                            </form>

                        </div>
                    </div>
                    <!---END OF THE REGISTRATION SECTION --->
                </main>
                <!---FOOTER SECTION BEGINNING --->
                <footer id="footer">
                    <div>
                        <img class="center-block" src="IMG/happyfeetlogo.png" alt="HappyFeetTravelBlog" width="300">
                    </div>
                    <div class="copyright text-center">
                        <p>Jamie Slaats - CodeFactory 2019&#169;</p>
                    </div>
                </footer>
                <!--- END OF FOOTER SECTION --->
            </div>
            <script src="JS/scriptpage2.js" type="text/javascript" charset="utf-8"></script>
        </body>

        </html>
        <?php ob_end_flush(); ?>