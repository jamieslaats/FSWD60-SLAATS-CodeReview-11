<?php /*

  ob_start();
  session_start();
  require_once 'actions/db_connect.php';

  if (isset($_SESSION['Admin']) == ""){
        header("Location: login.php");
            exit;
}
    $result = mysqli_query($connect, "SELECT * FROM `userdata` WHERE Status=". $_SESSION['Admin']. "");
    $count=mysqli_fetch_array($result, MYSQLI_ASSOC);

*/
?>



<!DOCTYPE html5>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - Happy Feet Travel Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/3.3/examples/carousel/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/homepage.css">
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
                <img class="center-block" src="IMG/happyfeetlogo.png">
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
                <li class="nav-item"><a href="adminpanel.php" title="AdminHome">Admin Home</a></li>
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
            <!--SCRIPTS FOR OUTPUTING DATA TO THE WEBPAGE FOR THE CONTENT MANAGEMENT -->
            <script>
                function viewContent() {
                    var viewcont = new XMLHttpRequest(); //create variable xhttp
                        viewcont.onreadystatechange = function() { //xhttp then on ready state change runs function.
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("viewcontentdataoutput").innerHTML = this.responseText;
                            }
                        };
                        viewcont.open("GET","./actions/viewcontent.php",true);
                        viewcont.send();
                    }

                    function createContent() {
                    var crecont = new XMLHttpRequest(); //create variable xhttp
                        crecont.onreadystatechange = function() { //xhttp then on ready state change runs function.
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("createcontentdataoutput").innerHTML = this.responseText;
                            }
                        };
                        crecont.open("GET","./actions/createcontent.php",true);
                        crecont.send();
                    }

                    function viewUser() {
                    var viewu = new XMLHttpRequest(); //create variable xhttp
                        viewu.onreadystatechange = function() { //xhttp then on ready state change runs function.
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("viewuserdataoutput").innerHTML = this.responseText;
                            }
                        };
                        viewu.open("GET","./actions/viewuser.php",true);
                        viewu.send();
                    }

                    function viewAddress() {
                    var viewaddre = new XMLHttpRequest(); //create variable xhttp
                        viewaddre.onreadystatechange = function() { //xhttp then on ready state change runs function.
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("viewaddressdataoutput").innerHTML = this.responseText;
                            }
                        };
                        viewaddre.open("GET","./actions/viewaddress.php",true);
                        viewaddre.send();
                    }

                    function createAddress() {
                    var creadd = new XMLHttpRequest(); //create variable xhttp
                        creadd.onreadystatechange = function() { //xhttp then on ready state change runs function.
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("createaddressdataoutput").innerHTML = this.responseText;
                            }
                        };
                        creadd.open("GET","./actions/createaddress.php",true);
                        creadd.send();
                    }
                </script> <!--END OF SCRIPTS -->
                <!-- CONTENT NAVIGATION BAR -->    
                <div>
                    <nav class="navbar navcolour navbar-justify">
                        <ul class="nav nav-pills nav-justified" id="navstyling">
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="Content_ID" onclick="viewContent()">View Content Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="Content_ID" onclick="createContent()">Create Content Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="User_ID" onclick="viewUser()">View User Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="viewAddress()">View Address Data</button></li>
                            <li class="nav-item"><button class="btn btn-default" type="submit" name="" onclick="createAddress()">Create Address Data</button></li>
                        </ul>
                    </nav>
                </div> <!--END OF CONTENT NAGIGATION BAR -->

                <!--CONTENT OUTPUT SECTION from NAVBAR-->
                <div class="jumbotron">
                        
                <div id="viewcontentdataoutput"></div>
                <div id="createcontentdataoutput"></div>
                <div id="viewuserdataoutput"></div>
                <div id="viewaddressdataoutput"></div>
                <div id="createaddressdataoutput"></div>
                </div>    
                <!--END of CONTENT OUTPUT SECTION from NAVBAR-->  

            </div>
        </main> <!--END OF CONTENT MANAGEMENT SECTION COMPLETELY-->
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
</body>

</html>
<?php //ob_end_flush(); ?>