<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$repoid = $_GET['repoid'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM report WHERE repoid=$repoid");

//redirecting to the display page (view.php in our case)
header("Refresh:1; url=view.php");
?>

