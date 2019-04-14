<?php

ob_start();
session_start(); // start a new session or continues the previous

if (isset($_SESSION['User'])){
    header("Location: home.php");
    exit;    
}
if (isset($_SESSION['Admin'])){
    header("Location: adminpanel.php");
    exit;  
}

include_once 'actions/db_connect.php';


$Email = "";
$Password = "";
$error = false;
$emailError = "";
$passError = "";

if ( isset($_POST['submit']) ) {

 $Email = trim($_POST['Email']); //trim - strips whitespace (or other characters) from the beginning and end of a string
 $Email = strip_tags($Email); // strip_tags — strips HTML and PHP tags from a string
 $Email = htmlspecialchars($Email); // htmlspecialchars converts special characters to HTML entities

 $Password = trim($_POST['Password']);
 $Password = strip_tags($Password);
 $Password = htmlspecialchars($Password);

  //basic email validation
 if (empty($Email)){
    $error = true;
    $emailError = "Please Fill In Your Email Address!";   
} else if ( !filter_var($Email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $emailError = "Please Enter Valid Address!";
}

 // password validation
if (empty($Password)){
  $error = true;
  $passError = "Please enter password.";
} else if(strlen($Password) < 6) {
  $error = true;
  $passError = "Password must have at least 6 characters.";
}

 // if there's no error, continue to signin
if( !$error ) {

  $pass = hash('sha256',$Password); //password hashing

  $result = mysqli_query($connect, "SELECT User_ID,Firstname, Surname, Email, Password, Status, Empl_ID FROM userdata WHERE Email = '$Email'");
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result); // if userid, firstname, lastname, pass is correct it returns must be 1 row --> Normally this is the line  $count = mysqli_num_rows($result);

  if($count ==1 && $row['Password']==$pass && $row['Status']==='Admin') {
    $_SESSION['Admin']= $row['User_ID'];
    header("Location: adminpanel.php");
} elseif ($count ==1 && $row['Password']==$pass && $row['Status']==='User') {
    $_SESSION['User'] = $row['User_ID'];
    header("Location: home.php");
}
else {
    $loginError = "Incorrect email or password";
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
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/signin.css">
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
                <li class="nav-item"><a href="index.php" title="Register">Register</a></li>
                <li class="nav-item"><a href="#contact" title="Contact">Contact</a></li>
            </ul>
        </nav>
        <main>
            <!---Start of Jumbotron Section1 --->
            <div class="jumbotron">
                <h1 class="card-title"><strong>
                    <center>Welcome</center>
                </strong></h1>
            </div>
            <!---END OF JUMBOTRON SECTION1 --->
            <!---START OF THE LOGIN SECTION --->
            <div class="fluid-container mt-2" id="login">
                <div class="jumbotron">
                    <form class="form-signin" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <?php 
                            if ( isset($errMSG) ) {
                                 echo $errMSG;}
                        ?>
                        <h2 class="form-signin-heading">Please Sign In:</h2>
                        <br>

                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="Email" value="<?php echo $Email ?>"  required>
                        <span class="text-danger"><?php echo $emailError; ?></span>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="Password" value="<?php echo $Password ?>" required>
                        <span class="text-danger"><?php echo $passError; ?></span>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember Me
                            </label>
                        </div>
                        <button id="loginbtn" class="btn btn-lg btn-block" type="submit" name="submit">Sign in</button>
                    </form>
                    
                </div>
            </div>
        </main>
        <!---FOOTER SECTION BEGINNING --->
        <footer id="footer">
            <div>
                <img class="center-block" src="img/happyfeetlogo.png" alt="HappyFeetTravelBlog" width="300">
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