<?php 

  ob_start();
  session_start();
  require_once 'db_connect.php';

  if (!isset($_SESSION['Admin'])){
        header("Location: login.php");
            exit;
}
    $result = mysqli_query($connect, "SELECT * FROM `userdata` WHERE User_ID=". $_SESSION['Admin']. "");
    $count=mysqli_fetch_array($result, MYSQLI_ASSOC);


?>


<!DOCTYPE html5>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - Happy Feet Travel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<!--BEGINNING OF BODY SECTION -->

<body>
    <div class="container-fluid">
        <!--START OF HEADER SECTION -->
        <header id="header">
            <div class="header">
                <img class="center-block" src="../IMG/happyfeetlogo.png">
            </div>
        </header><!--END OF HEADER SECTION-->

        <nav class="navbar navcolour navbar-justify">
            <ul class="nav nav-pills nav-justified" id="navstyling">
                <li class="nav-item"><a href="home.php" title="Home">Home</a></li>
                <li class="nav-item"><a href="#about" title="About">About</a></li>
                <li class="nav-item"><a href="#sights" title="TopSights">Top Sights</a></li>
                <li class="nav-item"><a href="restaurant.php" title="Restaurants">Restaurants</a></li>
                <li class="nav-item"><a href="event.php" title="Events">Events</a></li>
                <li class="nav-item"><a href="#contact" title="Contact">Contact</a></li>
                <li class="nav-item"><a href="../adminpanel.php" title="AdminHome">Admin Home</a></li>
                <li class="nav-item"><a href="#logout" title="logout">Logout</a></li>
            </ul>
        </nav>
        <br>
        <main class="">
            <!--START OF CONTENT MANAGEMENT SECTION -->
            <div class="contentmanagement">
                <div>
                 <h1 class="card-title"><strong>
                    <center>Happy Feet Content Management System</center>
                </strong></h1>
            </div>

			<!--CONTENT NAVIGATION BAR -->   
                <div>
                    <nav class="navbar navcolour navbar-justify">
                        <ul class="nav nav-pills nav-justified" id="navstyling">
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="Content_ID" onclick="viewContent()">View Content Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="createContent()">Create Content Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="viewUser()">View User Data</button></li>
                           <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="editUser()">Edit User Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="viewAddress()">View Address Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="createAddress()">Create Address Data</button></li>
                        </ul>
                    </nav>
                </div> <!--END OF CONTENT NAGIGATION BAR -->

<?php 

require_once 'db_connect.php';

if($_GET['User_ID']) {
	$userid = $_GET['User_ID'];

	$sql = "SELECT * FROM userdata WHERE User_ID = {$userid}";
        $result = $connect->query($sql); // mysqli_query($mysqli, $sql)

        $deluser = $result->fetch_assoc(); // mzsqli_fetch_assoc($result)
}        
?>
<div class="updatesections">
    	<div >
    		<h3>DELETE USER DATA</h3>
    	</div>
    	<hr>	

    	<form class="createupdateeditingforms" id="updateuserinfo" method="POST">
    	<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label type="hidden">User_ID</label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input type="hidden" name="User_ID" value="<?php echo $deluser["User_ID"] ?>">
    			</div>
    		</div>	
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">First Name: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Firstname" value="<?php echo $deluser["Firstname"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">Surname: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Surname" value="<?php echo $deluser["Surname"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">Email: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Email" value="<?php echo $deluser["Email"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">Password: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Password" value="<?php echo $deluser["Password"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">Status: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Status" value="<?php echo $deluser["Status"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<label id="labellettering">Employee ID: </label>
    			</div>
    			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    				<input class="form-control" type="text" name="Empl_ID" value="<?php echo $deluser["Empl_ID"] ?>">
    			</div>
    		</div>
    		<div class="row">
    			<div  id="labellettering" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    				<button  id="submitbtns" class="btn btn-lg btn-block" type="submit">Delete User</button>
    			</div>
    		</div>
    	</form>
    </div>

		<?php

			require_once 'db_connect.php';

            if($_POST) {

            	$userid = $_POST['User_ID'];

            	$sql = "DELETE FROM userdata WHERE User_ID = {$userid}";
            	if($connect->query($sql) === TRUE) {
            		echo "<p>Successfully Deleted</p>";
            		echo "<a href='../adminpanel.php'><button  id='submitbtns' class='btn btn-md btn' type='button'>Back to Admin Panel</button></a>";

            	} else {
            		echo "Error while updating record : ". $connect->error;
            	}

            	$connect->close();

            }
            ?>

            </div>
        </main> <!--END OF CONTENT MANAGEMENT SECTION COMPLETELY-->
        <!--FOOTER SECTION BEGINNING -->
        <footer id="footer">
            <div>
                <img class="center-block" src="../IMG/happyfeetlogo.png" alt="HappyFeetTravelBlog" width="300">
            </div>
            <div class="copyright text-center">
                <p>Jamie Slaats - CodeFactory 2019&#169;</p>
            </div>
        </footer>
        <!-- END OF FOOTER SECTION -->
    </div>
</body>

</html>
<?php ob_end_flush(); ?>
