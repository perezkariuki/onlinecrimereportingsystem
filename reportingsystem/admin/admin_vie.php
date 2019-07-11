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
$result = mysqli_query($mysqli, "SELECT * FROM personnel ORDER BY pid DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel= "stylesheet" type="text/css" href ="../work/admin.css" />
</head>
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
    		<li><a href=""> statement</a></li>
    		<li><a href="http://localhost/New/station/station_view.php">police station</a></li>
    		<li><a href="http://localhost/New/wanted/w_view.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
	</div>
</header>

<body>
	<div class="">
	<br/><br/><h1>Personnel Creation Portal</h1>
	<a href="admin_add.html" class="btn">Add New Data</a>
	<br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>fullname</td>
			<td>email</td>
			<td>username</td>
			<td>password</td>
			<td>functions</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['name']."</td>";
			echo "<td>".$_POST['email']."</td>";
			echo "<td>".$_POST['username']."</td>";
			echo "<td>".$_POST['password']."</td>";	
			echo "<td><a href=\"edit_admin.php?pid=$_POST[pid]\">Edit</a> | <a href=\"delete_admin.php?pid=$_POST[pid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			echo "</tr>";		
		}
		?>
	</table>
	</div>	
</body>
</html>
