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
	<title>Homepage</title>
</head>

<body>
	<a href="http://localhost/New/admin/admin_index.php">Home</a> | <a href="http://localhost/New/station/station_c.php">Add New Data</a> | <a href="http://localhost/New/logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>name</td>
			<td>location</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['name']."</td>";
			echo "<td>".$_POST['location']."</td>";
			echo "</tr>";	
		}
		?>
	</table>	
</body>
</html>
