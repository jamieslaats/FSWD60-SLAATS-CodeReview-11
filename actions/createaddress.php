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

<div class="createdatasections" id="hidesection">
	<div >
		<h3>CREATE ADDRESS CONTENT</h3>
	</div>
	<hr>	

	<form class="createupdateeditingforms" id="createaddressinputform" method="POST">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Street Name</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Street" placeholder="Street Name">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label  id="labellettering">City</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="City" placeholder="City">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Post Code/Zip Code</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Postcode" placeholder="Post/Zip Code">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">State/Province</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="State" placeholder="If Exists">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Country</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<input class="form-control" type="text" name="Country" placeholder="Country">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label id="labellettering">Admin Manageing</label>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<select class="form-control" name="fk_User_ID">
					<option value="''"></option>
					option
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
				<button  id="submitbtns" class="btn btn-lg btn-block" type="submit">Create Address</button>
			</div>
		</div>
	</form>
</div>

<?php
require_once 'db_connect.php';

if($_POST) {
	$street = $_POST['Street'];
	$city = $_POST['City'];
	$postcode = $_POST['Postcode'];
	$state = $_POST['State'];
	$country = $_POST['Country'];
	$userid = $_POST['fk_User_ID'];

	$sql = "INSERT INTO `addressdata`(`Street`, `City`, `Postcode`, `State`, `Country`, `fk_User_ID`) VALUES ('$street','$city','$postcode','$state','$country','$userid')";
	if($connect->query($sql) === TRUE) {
		echo "<p>New Record Successfully Created</p>";
		echo "<a href='../adminpanel.php'><button type='button'>Admin Home</button></a>";
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}


}
?>
<?php ob_end_flush(); ?>