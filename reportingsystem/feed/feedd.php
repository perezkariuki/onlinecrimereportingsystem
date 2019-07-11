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
$fid = $_GET['fid'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM feedback WHERE fid=$fid");

//redirecting to the display page (view.php in our case)
header("Location:feedv.php");
?>

