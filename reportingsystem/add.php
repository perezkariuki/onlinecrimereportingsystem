<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="imageswork/style.css">
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$statement = $_POST['statement'];
	$login_id = $_SESSION['id'];
		
	// checking empty fields
	if(empty($email) || empty($phoneno) || empty($statement)) {
				
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($phoneno)) {
			echo "<font color='red'>Phone no. field is empty.</font><br/>";
		}
		
		if(empty($statement)) {
			echo "<font color='red'>Statement field is empty.</font><br/>";
		}
		
		//link to the previous page
		header("Refresh:1; url=add.html");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO report(email, phoneno, statement, login_id) VALUES('$email','$phoneno','$statement', '$login_id')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
		header("Refresh:1; url=view.php");
	}
}
?>
</body>
</html>
