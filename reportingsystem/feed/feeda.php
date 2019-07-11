<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="../work/admin.css">
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
<body>
<?php
//including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit'])) {	
	$nameoff = $_POST['nameoff'];
	$offno = $_POST['offno'];
	$fbstate = $_POST['fbstate'];
	$admin_aid = $_SESSION['aid']; 
		
	// checking empty fields
	if(empty($nameoff) || empty($offno)|| empty($fbstate)) {
				
		if(empty($nameoff)) {
			echo "<font color='red'>Officer Name field is empty.</font><br/>";
		}
		
		if(empty($offno)) {
			echo "<font color='red'>Officer Serial no. field is empty.</font><br/>";
		}
		if(empty($fbstate)) {
			echo "<font color='red'>Statement field is empty.</font><br/>";
		}
		//link to the previous page
		header("location:feedc.php");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO feedback(nameoff, offno,fbstate,admin_aid) VALUES('$nameoff','$offno','$fbstate','$admin_aid')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='feedv.php'>View Result</a>";
		header("Refresh:1; url=feedv.php");
	}
}
?>
	<div class="titl"><br/>
	<h1>Admin Feedback portal</h1><br/>
	</div>
	<a href="feedv.php" class="btn">View Statement</a>
	<br/><br/>
	<div>
	<form action="" method="post" name="form1">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>officer name</td>
				<td><input type="text" name="nameoff" placeholder="Enter officer fullname"></td>
			</tr>
			<tr> 
				<td>officer serialno.</td>
				<td><input type="text" name="offno" placeholder="Enter Officer serialno"></td>
			</tr>
			<tr> 
				<td>report feedback</td>
				<td><input type="text" name="fbstate" placeholder="Enter recomended Feedback"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>