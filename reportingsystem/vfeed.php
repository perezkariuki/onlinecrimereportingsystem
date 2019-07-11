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
$result = mysqli_query($mysqli, "SELECT * FROM feedback ORDER BY fid DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="work/user.css">
</head>

<body>
	<header>
	<ul class="links" >
		<li><a href="http://localhost/New/index.php">Home</a></li>
    	<li>login
    		<ul>
    			<li><a href="http://localhost/New/login.php">user</a></li>
    		</ul>
    	</li>
    	<li>view
    		<ul>
    		<li><a href="http://localhost/New/view.php"> statement</a></li>
    		<li><a href="http://localhost/New/vstation.php">police station</a></li>
    		<li><a href="http://localhost/New/vwanted.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
</header>
	<div class=""><br/><br/>
	<h1>View Feedback</h1><br/>
	<a href="http://localhost/New/view.php" class="btn">view report</a><br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>officer name</td>
			<td>officer serialno.</td>
			<td>statement feedback</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['nameoff']."</td>";
			echo "<td>".$_POST['offno']."</td>";
			echo "<td>".$_POST['fbstate']."</td>";
			echo "</tr>";		
		}
		?>
	</table>
	</div>	
</body>
</html>
