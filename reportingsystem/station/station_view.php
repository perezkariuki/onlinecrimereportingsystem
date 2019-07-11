<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM station ORDER BY sid DESC");
?>

<html>
<head>
	<title>view</title>
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
	<div class=""><br/><br/>
	<h1>View Police station</h1><br/>
	<a href="http://localhost/New/station/station_c.php" class="btn">|Add New Police station|</a><br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>name</td>
			<td>location</td>
			<td>Functionality</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['name']."</td>";
			echo "<td>".$_POST['location']."</td>";
			echo "<td><a href=\"station_ed.php?sid=$_POST[sid]\">Edit</a> | <a href=\"station_del.php?sid=$_POST[sid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			echo "</tr>";	
		
		}
		?>
	</table>	
</body>
</html>
