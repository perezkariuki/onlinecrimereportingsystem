<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="../imageswork/style.css">
</head>

<body>
<?php
//including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['email'];
	$email = $_POST['phoneno'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];
	$admin_aid = $_SESSION['aid'];
		
	// checking empty fields
	if(empty($name) || empty($email) || empty($username) || empty($password) || empty($usertype)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($usertype)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		//link to the previous page
		header("location:admin_add.html");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO personnel(name, email, username, password, usertype, admin_aid) VALUES('$name','$email','$username','$password','$usertype', '$admin_aid')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='station_view.php'>View Result</a>";
		header("Refresh:1; url=station_view.php");
	}
}
?>
	<a href="http://localhost/New/admin/admin_index.php">Home</a> | <a href="http://localhost/New/station/station_view.php">View Statement</a> | <a href="http://localhost/New/logout.php">Logout</a>
	<br/><br/>

	<form action="" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr> 
				<td>username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>
				<select name="usertype">
  				<option value="">select an option</option>
  				<option value="admin">admin</option>
  				<option value="officer">officer</option>
  				<option value="citizen">citizen</option>
				</select>
				</td>
			</tr>
			<tr> 
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>