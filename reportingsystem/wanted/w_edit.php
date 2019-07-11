<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: admin_log.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{	
	$wid = $_POST['wid'];
	$name = $_POST['name'];
	$idno = $_POST['idno'];
	$seen = $_POST['seen'];
	$image = $_POST['image'];
	
	// checking empty fields
	if(empty($name) || empty($idno) || empty($seen) || empty($image)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($idno)) {
			echo "<font color='red'>IDno. or Passport no. field is empty.</font><br/>";
		}
		
		if(empty($seen)) {
			echo "<font color='red'>lastseen field is empty.</font><br/>";
		}
		if(empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE wanted SET name='$name', idno='$idno', seen='$seen',image='$image' WHERE wid=$wid");
		
		//redirectig to the display page. In our case, it is view.php
		header("Refresh:10; url=w_view.php");
	}
}
?>
<?php
if (isset($_GET['wid'])){
//getting id from url
$wid = $_GET['wid'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM wanted WHERE wid = $wid");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$idno = $res['idno'];
	$seen = $res['seen'];
	$image = $res['image'];
}
}
?>
<html>
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
	<h1>Edit wanted persons platform</h1><br/>
	</div>
	<a href="http://localhost/New/wanted/w_view.php" class="btn">View Wanted persons</a>
	<br/>
	<div>
	<form name="form1" method="post" action="w_edit.php">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>full name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>national id or passport no.</td>
				<td><input type="text" name="idno" value="<?php echo $idno;?>"></td>
			</tr>
			<tr> 
				<td>last point seen</td>
				<td><input type="text" name="seen" value="<?php echo $seen;?>"></td>
			</tr>
			<tr> 
				<td>image</td>
				<td><input type="text" name="image" value="<?php echo $image;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="wid" value="<?php echo $_GET['wid'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
