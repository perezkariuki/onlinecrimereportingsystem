<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: admin_log.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM wanted WHERE admin_aid=".$_SESSION['aid']." ORDER BY wid DESC");
?>

<html>
<head>
	<title>Homepage</title>
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
	</header><br/><br/>
	<div class="">
	<h1>View wanted persons</h1><br/>
	<a href="w_add.html" class="btn">|Add New Data|</a>
	<br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>full name</td>
			<td>national id or passport no</td>
			<td>last seen</td>
			<td>image</td>
			<td>functionality</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['name']."</td>";
			echo "<td>".$_POST['idno']."</td>";
			echo "<td>".$_POST['seen']."</td>";
			echo "<td>".$_POST['image']."</td>";	
			echo "<td><a href=\"w_edit.php?wid=$_POST[wid]\">Edit</a> | <a href=\"w_delete.php?wid=$_POST[wid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>
	</div>	
</body>
</html>
