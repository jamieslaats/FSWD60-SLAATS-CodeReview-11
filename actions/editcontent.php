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
    <title>Happy Feet Travel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/homepage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<!---BEGINNING OF BODY SECTION --->

<body>
    <div class="container-fluid">
        <!--START OF HEADER SECTION-->
        <header id="header">
            <div class="header">
                <img class="center-block" src="../IMG/happyfeetlogo.png">
            </div>
        </header><!-- END OF HEADER SECTION -->

        <nav class="navbar navcolour navbar-justify">
            <ul class="nav nav-pills nav-justified" id="navstyling">
                <li class="nav-item"><a href="home.php" title="Home">Home</a></li>
                <li class="nav-item"><a href="#about" title="About">About</a></li>
                <li class="nav-item"><a href="#sights" title="TopSights">Top Sights</a></li>
                <li class="nav-item"><a href="restaurant.php" title="Restaurants">Restaurants</a></li>
                <li class="nav-item"><a href="event.php" title="Events">Events</a></li>
                <li class="nav-item"><a href="#contact" title="Contact">Contact</a></li>
                <li class="nav-item"><a href="./adminpanel.php" title="AdminHome">Admin Home</a></li>
                <li class="nav-item"><a href="#logout" title="logout">Logout</a></li>
            </ul>
        </nav>
        <br>
        <main class="">
            <!---START OF CONTENT MANAGEMENT SECTION --->
            <div class="contentmanagement">
                <div>
                   <h1 class="card-title"><strong>
                    <center>Happy Feet Content Management System</center>
                </strong></h1>
            </div>

            <!-- CONTENT NAVIGATION BAR -->    
            <div>
                <nav class="navbar navcolour navbar-justify">
                    <ul class="nav nav-pills nav-justified" id="navstyling">
                        <li class="nav-item"><button class="btn btn-default" type="submit" name="Content_ID" onclick="viewContent()">View Content Data</button></li>
                        <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="createContent()">Create Content Data</button></li>
                        <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="viewUser()">View User Data</button></li>
                        <!--  <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="editUser()">Edit User Data</button></li> -->
                        <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="viewAddress()">View Address Data</button></li>
                        <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="createAddress()">Create Address Data</button></li>
                    </ul>
                </nav>
            </div> <!--END OF CONTENT NAGIGATION BAR -->


            <?php 

            require_once 'db_connect.php';

            if($_GET['Content_ID']) {
               $contentid = $_GET['Content_ID'];

               $sql = "SELECT * FROM contentdata WHERE Content_ID = {$contentid}";
    $result = $connect->query($sql); // mysqli_query($mysqli, $sql)

    $contupdate = $result->fetch_assoc(); // mzsqli_fetch_assoc($result)
}        
?>
<div class="updatesections">
	<div >
		<h3>UPDATE CONTENT DATA</h3>
	</div>
	<hr>	

	<form class="createupdateeditingforms" id="updatecontentinfo" method="POST">
       <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label type="hidden">Content ID</label>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <input type="hidden" name="Content_ID" value="<?php echo $contupdate["Content_ID"] ?>">
        </div>
    </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Image</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Image" value="<?php echo $contupdate["Image"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Location Type</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="labellettering" name="Locationtype">
                    <option><?php echo $contupdate['Locationtype'] ?></option>
                    <option disabled="">---------------------------</option>
                    <option value="Sights">Sights</option>
                    <option value="Event">Event</option>
                    <option value="Eatery">Eatery</option>
                </select>   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Location Name</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Locationname" value="<?php echo $contupdate["Locationname"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Address</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="labellettering" name="fk_Address_ID">
                    <option><?php echo $contupdate["fk_Address_ID"] ?></option>
                    <option disabled="">---------------------------</option>
                    <option></option>
                    <?php 
                    require_once 'db_connect.php';

                    $sql = $connect->query("SELECT * FROM `addressdata`");
                    while($addrdata = $sql->fetch_assoc()){
                        echo "<option value=" .$addrdata['Address_ID']. " > ".$addrdata['Address_ID']. " -> ".$addrdata['Street']. ", ".$addrdata['City']. "</option>";
                    }   
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Telephone</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Telephone" value="<?php echo $contupdate["Telephone"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Website</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Webaddress" value="<?php echo $contupdate["Webaddress"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Metro Stop</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Metrostop" value="<?php echo $contupdate["Metrostop"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Opening Times</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="OpenTimes" value="<?php echo $contupdate["OpenTimes"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Value</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Value" value="<?php echo $contupdate["Value"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Event Location</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Eventplacename" value="<?php echo $contupdate["Eventplacename"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Entry Price</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="text" name="Entrycost" value="<?php echo $contupdate["Entrycost"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Event Time</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="time" name="Eventtime" value="<?php echo $contupdate["Eventtime"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Event Date</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <input class="form-control" type="date" name="Eventdate" value="<?php echo $contupdate["Eventdate"] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label id="labellettering">Admin Managing</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="labellettering" name="fk_User_ID">
                    <option><?php echo $contupdate["fk_User_ID"] ?></option>
                    <option disabled="">--------------------</option>
                    <option></option>
                    <?php 
                    require_once 'db_connect.php';

                    $sql = $connect->query("SELECT * FROM userdata WHERE userdata.Status = 'Admin'");
                    while($adminManage = $sql->fetch_assoc()){
                        echo "<option value=" .$adminManage['User_ID']. " > ".$adminManage['User_ID']. " - ".$adminManage['Surname']. " - ".$adminManage['Empl_ID']."</option>";
                    }   
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div  id="labellettering" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button id="submitbtns" class="btn btn-lg btn-block" type="submit">Update Content</button>
            </div>
        </div>
    </form>
</div>

<?php
require_once 'db_connect.php';

if($_POST) {
    $image = $_POST['Image'];
    $locationtype = $_POST['Locationtype'];
    $locationname = $_POST['Locationname'];
    $fkaddressid = $_POST['fk_Address_ID'];
    $telephone = $_POST['Telephone'];
    $webaddress = $_POST['Webaddress'];
    $metrostop = $_POST['Metrostop'];
    $opentimes = $_POST['OpenTimes'];
    $value = $_POST['Value'];
    $eventplacename = $_POST['Eventplacename'];
    $entrycost = $_POST['Entrycost'];
    $eventtime = $_POST['Eventtime'];
    $eventdate = $_POST['Eventdate'];
    $userid = $_POST['fk_User_ID'];

    $contentid = $_POST['Content_ID'];

    $sql = "UPDATE contentdata SET Image = '$image', Locationtype = '$locationtype', Locationname = '$locationname', fk_Address_ID = '$fkaddressid', Telephone = '$telephone', Webaddress = '$webaddress', Metrostop = '$metrostop', OpenTimes = '$opentimes', Value = '$value', Eventplacename = '$eventplacename', Entrycost = '$entrycost', Eventtime = '$eventtime', Eventdate = '$eventdate', fk_User_ID = '$userid' WHERE Content_ID = {$contentid}";
    if($connect->query($sql) === TRUE) {
      echo "<p>Successfully Updated</p>";
      echo "<a href='../adminpanel.php'><button  id='submitbtns' class='btn btn-md btn' type='button'>Back to Admin Panel</button></a>";

  } else {
      echo "Error while updating record : ". $connect->error;
  }

  $connect->close();

}
?>

</div>
</main> <!--END OF CONTENT MANAGEMENT SECTION COMPLETELY-->
<!---FOOTER SECTION BEGINNING --->
<footer id="footer">
    <div>
        <img class="center-block" src="../IMG/happyfeetlogo.png" alt="HappyFeetTravelBlog" width="300">
    </div>
    <div class="copyright text-center">
        <p>Jamie Slaats - CodeFactory 2019&#169;</p>
    </div>
</footer>
<!--- END OF FOOTER SECTION --->
</div>
</body>

</html>
<?php ob_end_flush(); ?>