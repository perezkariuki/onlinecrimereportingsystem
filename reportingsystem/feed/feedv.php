<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:login.php');
}
?>

<?php
//including the database connection file
include_once("../connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM feedback ORDER BY fid DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../work/ofus.css">
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
<div class="titl"><br/><br/>
<h1>feedback View Platform</h1><br/>
	<a href="feedc.php" class="btn">|(officer)Add New Data|</a><br/><br/>
	<a href="feeda.php" class="btn">|(Admin)Add New Data|</a>
	<br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>officer name</td>
			<td>officer serialno.</td>
			<td>statement feedback</td>
			<td>functinality</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['nameoff']."</td>";
			echo "<td>".$_POST['offno']."</td>";
			echo "<td>".$_POST['fbstate']."</td>";
			echo "<td><a href=\"feede.php?fid=$_POST[fid]\">Edit</a> | <a href=\"feedd.php?fid=$_POST[fid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			echo "</tr>";		
		}
		?>
	</table>
</div>	
</body>
</html>
