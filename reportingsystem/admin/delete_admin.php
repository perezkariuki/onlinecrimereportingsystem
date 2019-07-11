<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<?php
//including the database connection file
include("../connection.php");

//getting id of the data from url
$pid = $_GET['pid'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM personnel WHERE pid=$pid");

//redirecting to the display page (view.php in our case)
header("Location:admin_vie.php");
?>

