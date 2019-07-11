<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM report WHERE login_id=".$_SESSION['id']." ORDER BY repoid DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="work/user.css">
</head>

<body>
<header>
	<div>
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
    	<li>Report
    		<ul>
    			<li><a href="http://localhost/New/add.html"> Add report</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
    </div>
</header>
	<div class="">
	<h1 >Report portal</h1><br/>
	<a href="http://localhost/New/add.html" class="btn">Add statement</a><br/><br/>
	</div>
	<div class="table" >
	<table width='80%' border=0 class="tab">
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
			echo "<td><a href=\"edit.php?repoid=$_POST[repoid]\">Edit</a> | <a href=\"delete.php?repoid=$_POST[repoid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"vfeed.php?repoid=$_POST[repoid]\">view_feedback</a></td>";		
		}
		?>
	</table>
	</div>	
</body>
</html>
