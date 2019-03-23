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


<div class="createdatasections">
	<div >
		<h3>CREATE CONTENT DATA</h3>
	</div>
	<hr>	

	<form class="createupdateeditingforms" id="createcontentinputform" action="./actions/createcontent.php" method="POST">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Image</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Image" placeholder="./IMG/abcd.jpg">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Location Type</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" id="labellettering" name="Locationtype">
					<option disabled="">Select Type</option>
					option
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
				<input class="form-control" type="text" name="Locationname" placeholder="Place of Interest">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Address</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" id="labellettering" name="fk_Address_ID">
					<option disabled="">Select Address</option>
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
				<input class="form-control" type="text" name="Telephone" placeholder="+7 (120) 345898989">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Website</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Webaddress" placeholder="www.aba.com">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Metro Stop</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Metrostop" placeholder="Admiralteyskaya">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Opening Times</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="OpenTimes" placeholder="12:00 - 13:00">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Value</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Value" placeholder="€€€€">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Event Location</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Eventplacename" placeholder="">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Entry Price</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Entrycost" placeholder="000 Rbl">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Event Time</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="time" name="Eventtime" placeholder="17:00">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Event Date</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="date" name="Eventdate" placeholder="17 Oct 2019">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Admin Managing</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" id="labellettering" name="fk_User_ID">
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
				<button  id="submitbtns" class="btn btn-lg btn-block" type="submit">Create Content</button>
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

	$sql = "INSERT INTO `contentdata`(`Image`, `Locationtype`, `Locationname`, `fk_Address_ID`, `Telephone`, `Webaddress`, `Metrostop`, `OpenTimes`, `Value`, `Eventplacename`, `Entrycost`, `Eventtime`, `Eventdate`, `fk_User_ID`) VALUES ('$image','$locationtype','$locationname','$fkaddressid','$telephone','$webaddress','$metrostop','$opentimes','$value','$eventplacename','$entrycost','$eventtime','$eventdate','$userid')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../adminpanel.php'><button type='button'>Admin Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}


}
?>
<?php // ob_end_flush(); ?>