<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
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
include_once("../connection.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$idno = $_POST['idno'];
	$seen = $_POST['seen'];
	$image = $_POST['image'];
	$admin_aid = $_SESSION['aid'];
		
	// checking empty fields
	if(empty($name) || empty($idno) || empty($seen) || empty($image)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($idno)) {
			echo "<font color='red'>IDno. or Passport no. field is empty.</font><br/>";
		}
		
		if(empty($seen)) {
			echo "<font color='red'>lastseen field is empty.</font><br/>";
		}
		if(empty($image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
		
		//link to the previous page
		header("Refresh:1; url=w_add.html");
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO wanted(name, idno, seen, image, admin_aid) VALUES('$name','$idno','$seen','$image', '$admin_aid')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='w_view.php'>View Result</a>";
		header("Refresh:1; url=w_view.php");
	}
}
?>
</body>
</html>
