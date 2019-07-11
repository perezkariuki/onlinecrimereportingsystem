<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{
	$sid = $_POST['sid'];
	$name = $_POST['name'];
	$location = $_POST['location'];	

if(empty($name) || empty($location)) {

	$name = $_POST['name'];
	$location = $_POST['location'];
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE station SET name='$name', location='$location' WHERE sid=$sid");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: station_view.php");
	}
}
?>
<?php
//getting id from url
if (isset($_GET['sid'])){
$sid = $_GET['sid'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM station WHERE sid = $sid");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$location = $res['location'];
}
}
?>
<Doctype html>
<head>	
	<title>Edit Data</title>
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
	<div class="titl"><br/>
	<h1>Edit station</h1>
	</div>
	<a href="station_view.php" class="btn">|View Police station|</a><br/><br/>
	<div>
	<form name="form1" method="post" action="station_ed.php">
		<table  width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>location</td>
				<td><input type="text" name="location" value="<?php echo $location;?>"></td>
			</tr>
			<tr>
			<td><input type="hidden" name="sid" value="<?php echo $_GET['sid'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>