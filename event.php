<?php 

  ob_start();
  session_start();
  require_once 'actions/db_connect.php';


if (!isset($_SESSION['User'])){
    header('Location : login.php');
}

    $result = mysqli_query($connect, "SELECT * FROM `userdata` WHERE User_ID=". $_SESSION['User']. "");
    $userRow=mysqli_fetch_array($result, MYSQLI_ASSOC);

  $log = "Login";
  if(isset($_SESSION['User'])){
    $log = "Logout";
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
                <li class="nav-item"><a href="home.php" title="Home">Home</a></li>
                <li class="nav-item"><a href="#about" title="About">About</a></li>
                <li class="nav-item"><a href="#sights" title="TopSights">Top Sights</a></li>
                <li class="nav-item"><a href="restaurant.php" title="Restaurants">Restaurants</a></li>
                <li class="nav-item"><a href="event.php" title="Events">Events</a></li>
                <li class="nav-item"><a href="#contact" title="Contact">Contact</a></li>
                <li class="nav-item"><a href="logout.php?logout" title="logout">Logout</a></li>
            </ul>
        </nav>
        <main>
            <!---Start of Jumbotron Section --->
            <div class="jumbotron">
                <h1 class="card-title"><strong><center>St. Petersburg, Russia</center></strong></h1>
                <!---Start of Carousel for Pictures--->
                <div id="carousel-stpetersburg" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-stpetersburg" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-stpetersburg" data-slide-to="1"></li>
                        <li data-target="#carousel-stpetersburg" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for Picture Carousel -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="IMG/river-3729956_1280.jpg" alt="St.PetersburgRiver">
                            
                        </div>
                        <div class="item">
                            <img src="IMG/metro-3714290_1280.jpg" alt="St.PetersburgMetro">
                        </div>
                        <div class="item">
                            <img src="IMG/church-3710237_1280.jpg" alt="St.PetersburgChurch">
                        </div>
                    </div>
                    <!--Controls for Carousel-->
                    <a class="left carousel-control" href="#carousel-stpetersburg" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-stpetersburg" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End of Controls for Carousel-->
                <h3 class="card-title"><center>A City Everyone Must Visit Once in Their Life!<center></h3>
                </div>
                <!---END OF JUMBOTRON SECTION --->
                <!---START OF THE CONTENT SECTION --->
                <div>

                    <div class='row'>
                        <div class='col-lg-12 content1' id="sights">
                            <a name="sights"><h2><span id="s1">Top</span> Events</h2></a>
                        </div>
                    </div>
                    <div class='row'>

                        <?php
                        require_once 'actions/db_connect.php';

                        $sql = "SELECT `Content_ID`,`Image`, `Locationtype`, `Locationname`, `Street`, `City`,`Postcode`, `Telephone`, `Webaddress`, `Metrostop`, `OpenTimes`, `Value`, `Eventplacename`,`Style`, `Entrycost`, `Eventtime`, `Eventdate`, `contentdata`.`Created` 
                        FROM `contentdata` 
                        INNER JOIN `addressdata` ON `contentdata`.`fk_Address_ID` = `addressdata`.`Address_ID`
                        WHERE `contentdata`.`Locationtype` = 'Event'";

                        $result = $connect->query($sql);

                        if($result->num_rows > 0) {
                            while($event = $result->fetch_assoc()) {


                               echo   '<div class="col-lg-6 col-md-6 col-sd-12" id="'.$event['Content_ID'].'">
                               <div class="travelcard"><img class="travelcard-img-top" src="' .$event['Image']. '" alt="TravelCard image cap">
                               <div class="travelcard-body"><h3 class="travelcard-title">' .$event['Locationname']. '</h3>
                               <p class="travelcard-text"><span>Location:</span> "' .$event['Eventplacename']. '"</p>
                               <p class="travelcard-text"><span>Address:</span> "'.$event['Street'].'", "' .$event['City']. '", "' .$event['Postcode'].  '"</p>
                               <p class="travelcard-text"><span>Tel:</span> "' .$event['Telephone']. '"</p>
                               <p class="travelcard-text"><span>Date:</span> "' .$event['Eventdate']. '"</p>
                               <p class="travelcard-text"><span>Showings:</span> "' .$event['Eventtime']. '"</p>
                               <p class="travelcard-text"><span>Price:</span> "' .$event['Entrycost']. '"</p>
                               <p class="font-italic text-secondary">Created: "' .$event['Created']. '"</p>
                               </div>
                               </div>
                               </div>';
                           }
                       };
                       ?>

                   </div>
                   <div class="row">
                    <div class='col-lg-12' id='toparrow'>
                        <a href='home.php'><span class='glyphicon glyphicon-arrow-up'></span> Top</a>
                    </div>
                </div>
            </div>    

            <!---END OF THE CONTENT SECTION --->
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
    <script src="JS/script.js" type="text/javascript" charset="utf-8"></script>
    <script src="JS/scriptpage2.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>

<?php ob_end_flush(); ?>