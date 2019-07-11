<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM report"." ORDER BY repoid DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="imageswork/style.css">
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="http://localhost/New/logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>email</td>
			<td>phone no</td>
			<td>statement</td>
			<td>Update</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['email']."</td>";
			echo "<td>".$_POST['phoneno']."</td>";
			echo "<td>".$_POST['statement']."</td>";	
			echo "feedback";		
		}
		?>
	</table>	
</body>
</html>
