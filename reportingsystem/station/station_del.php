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
$sid = $_GET['sid'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM station WHERE sid=$sid");

//redirecting to the display page (view.php in our case)
header("Location:station_view.php");
?>

