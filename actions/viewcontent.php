<?php 

  ob_start();
  session_start();
  require_once 'actions/db_connect.php';

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

echo "<table border='0' cellspacing='0' cellpadding='0' class='table table-bordered table-condensed'>
<thead>
<h3> VIEW CONTENT DATA</h3>
<tr>
<th>ContentID</th>
<th>Image</th>
<th>Location Type</th>
<th>Location Name</th>
<th>AddressID</th>
<th>Street</th>
<th>City</th>
<th>State</th>
<th>PostCode/ZIP</th>
<th>Country</th>
<th>Telephone</th>
<th>Web</th>
<th>Metro</th>
<th>Opening Times</th>
<th>Value</th>
<th>Event Place</th>
<th>Entry Cost</th>
<th>Event Times</th>
<th>Event Date</th>
<th>Created On</th>
<th>Modified</th>
<th>EmployeeID</th>
<th>Surname</th>
<th>Edit/Delete</th>

</tr>
</thead>
<tbody>";

if($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
   echo "<tr>
   <td>".$row['Content_ID']."</td>
   <td><img src='".$row['Image']."' width=100px></td>
   <td>".$row['Locationtype']."</td>
   <td>".$row['Locationname']."</td>
   <td>".$row['fk_Address_ID']."</td>
   <td>".$row['Street']."</td>
   <td>".$row['City']."</td>
   <td>".$row['State']."</td>
   <td>".$row['Postcode']."</td>
   <td>".$row['Country']."</td>
   <td>".$row['Telephone']."</td>
   <td>".$row['Webaddress']."</td>
   <td>".$row['Metrostop']."</td>
   <td>".$row['OpenTimes']."</td>
   <td>".$row['Value']."</td>
   <td>".$row['Eventplacename']."</td>
   <td>".$row['Entrycost']."</td>
   <td>".$row['Eventtime']."</td>
   <td>".$row['Eventdate']."</td>
   <td>".$row['Created']."</td>
   <td>".$row['Modified']."</td>
   <td>".$row['Empl_ID']."</td>
   <td>".$row['Surname']."</td>
   <td> 
  <a href='./actions/editcontent.php?Content_ID=".$row['Content_ID']."'><button type='button'><i class='fas fa-edit'></i></button></a>
  <a href='./actions/deletecontent.php?Content_ID=".$row['Content_ID']."'><button type='button'><i class='fas fa-trash-alt'></i></button></a>
   </tr>";

 }
} else {
 echo "<tr><td colspan='26'><center>No Data Avaliable</center></td></tr>";
}
echo "</tbody></table>";

$connect->close();
?>
<?php ob_end_flush(); ?>