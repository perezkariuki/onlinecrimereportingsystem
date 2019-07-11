<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: admin_log.php');
}
?>

<?php
//including the database connection file
include("../connection.php");

//getting id of the data from url
$wid = $_GET['wid'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM wanted WHERE wid=$wid");

//redirecting to the display page (view.php in our case)
header("Refresh:1; url=w_view.php");
?>

