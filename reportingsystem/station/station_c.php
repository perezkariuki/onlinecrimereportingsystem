<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="../work/admin.css">
</head>
<body>
	<header>
		<div>
	<ul class="links" >
		<li>Home
			<ul>
			<li>
			<a href="http://localhost/New/admin/admin_index.php">Admin_Home</a>
			</li>
			<li>
			<a href="http://localhost/New/index.php">Main Home</a></li>
			</ul>
		</li>
    	<li>login
    		<ul>
    			<li><a href="http://localhost/New/admin/admin_log.php"> admin</a></li>
    			<li><a href="http://localhost/New/personnel/p_login.php">officer</a></li>
    			<li><a href="http://localhost/New/login.php">user</a></li>
    		</ul>
    	</li>
    	<li>view
    		<ul>
    		<li><a href="http://localhost/New/vview.php"> statement</a></li>
    		<li><a href="http://localhost/New/station/station_view.php">police station</a></li>
    		<li><a href="http://localhost/New/wanted/w_view.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
	</div>
	</header>
<?php
//including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$location = $_POST['location']; 
	$admin_aid = $_SESSION['aid'];
		
	// checking empty fields
	if(empty($name) || empty($location)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>location field is empty.</font><br/>";
		}
		//link to the previous page
		header("location:station_c.html");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO station(name, location,admin_aid) VALUES('$name','$location','$admin_aid')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='station_view.php'>View Result</a>";
		header("Refresh:1; url=station_view.php");
	}
}
?>
	<div class="titl"><br/>
	<h1>Add new Police sation</h1>
	</div>
	<a href="http://localhost/New/station/station_view.php" class="btn">View Station</a>
	<br/>
	<div>
	<form action="" method="post" name="form1">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>Station name</td>
				<td><input type="text" name="name" placeholder="Enter station name"></td>
			</tr>
			<tr> 
				<td>location</td>
				<td><input type="text" name="location" placeholder="Enter station location"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>