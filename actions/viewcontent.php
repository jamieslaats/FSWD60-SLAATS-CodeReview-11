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

<?php
require_once 'db_connect.php';

$sql = "SELECT `Content_ID`, `Image`, `Locationtype`, `Locationname`, `fk_Address_ID`,`Street`, `City`,`Postcode`,`State`,`Country`, `Telephone`, `Webaddress`, `Metrostop`, `OpenTimes`, `Value`, `Eventplacename`, `Entrycost`, `Eventtime`, `Eventdate`, `contentdata`.`Created`, `contentdata`.`Modified`, `contentdata`.`fk_User_ID`,`Empl_ID`,`Surname`
FROM `contentdata`
INNER JOIN `addressdata` ON `contentdata`.`fk_Address_ID` = `addressdata`.`Address_ID`
INNER JOIN `userdata` ON `contentdata`.`fk_User_ID` = `userdata`.`User_ID`
ORDER BY `Locationtype`";

       //when createing above like this `authors`.Name as authorName it is making it more simple to remember and link the name. Then used below. 
$result = $connect->query($sql);


if($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
   echo  '<div class="col-lg-4 col-md-6 col-sd-12 viewcontentp">                              
                           <img src="' .$row['Image']. '" width=200px alt="TravelCard image cap">
                           <p class="viewcontentp"><span>Content ID: </span>' .$row['Content_ID']. '</p>
                           <p class="viewcontentp"><span>Location Type: </span>' .$row['Locationtype']. '</p>
                           <p class="viewcontentp"><span>Location Name: </span>' .$row['Locationname']. '</p>
                           <p class="viewcontentp"><span>AddressID: </span>' .$row['fk_Address_ID']. '</p>
                           <p class="viewcontentp"><span>Street: </span>'.$row['Street'].'</p>
                           <p class="viewcontentp"><span>City: </span>'.$row['City'].'</p>
                           <p class="viewcontentp"><span>State: </span>'.$row['State'].'</p>
                           <p class="viewcontentp"><span>PostCode: </span>'.$row['Postcode'].'</p>
                           <p class="viewcontentp"><span>Country: </span>'.$row['Country'].'</p>
                           <p class="viewcontentp"><span>Tel: </span>'.$row['Telephone'].'</p>
                           <p class="viewcontentp"><span>Web: </span>'.$row['Webaddress'].'</p>
                           <p class="viewcontentp"><span>Metro: </span>'.$row['Metrostop'].'</p>
                           <p class="viewcontentp"><span>OpenTimes: </span>'.$row['OpenTimes'].'</p>
                           <p class="viewcontentp"><span>Value: </span>'.$row['Value'].'</p>
                           <p class="viewcontentp"><span>Event Place: </span>'.$row['Eventplacename'].'</p>
                           <p class="viewcontentp"><span>Event Cost: </span>'.$row['Entrycost'].'</p>
                           <p class="viewcontentp"><span>Event Time: </span>'.$row['Eventtime'].'</p>
                           <p class="viewcontentp"><span>Event Date: </span>'.$row['Eventdate'].'</p>
                           <p class="viewcontentp"><span>Created: </span>'.$row['Created'].'</p>
                           <p class="viewcontentp"><span>Modified:  </span>'.$row['Modified'].'</p>
                           <p class="viewcontentp"><span>EmplID: </span>'.$row['Empl_ID'].'</p>
                           <p class="viewcontentp"><span>Surname:  </span>'.$row['Surname'].'</p>
                           <p><a href="./actions/editcontent.php?Content_ID='.$row['Content_ID'].'"><button type="button"><i class="fas fa-edit"></i></button></a>  <a href="./actions/deletecontent.php?Content_ID='.$row['Content_ID'].'"><button type="button"><i class="fas fa-trash-alt"></i></button></a></p>
                           </div>';

 }
} else {
 echo "<p><center>No Data Avaliable</center></p>";
}

$connect->close();
?>
<?php ob_end_flush(); ?>