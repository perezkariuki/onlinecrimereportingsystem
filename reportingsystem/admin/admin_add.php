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

<body>
<?php
//including the database connection file
include_once("../connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$admin_aid = $_SESSION['aid'];
		
	// checking empty fields
	if(empty($name) || empty($email) || empty($username) || empty($password)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		//link to the previous page
		header("location:admin_add.html");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO personnel(name, email, username, password, admin_aid) VALUES('$name','$email','$username','$password', '$admin_aid')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin_vie.php'>View Result</a>";
		header("Refresh:1; url=admin_vie.php");
	}
}
?>
</body>
</html>
