<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$repoid = $_POST['repoid'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$statement = $_POST['statement'];	
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE report SET email='$email', phoneno='$phoneno', statement='$statement' WHERE repoid=$repoid");
		
		//redirectig to the display page. In our case, it is view.php
		header("Refresh:1; url=view.php");
	}
}
?>
<?php
//getting id from url
if (isset($_GET['repoid'])){
$repoid = $_GET['repoid'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM report WHERE repoid = $repoid");

while($res = mysqli_fetch_array($result))
{
	$email = $res['email'];
	$phoneno = $res['phoneno'];
	$statement = $res['statement'];
}
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="work/user.css">
</head>

<body>
	<header>
	<ul class="links" >
		<li><a href="http://localhost/New/index.php">Home</a></li>
    	<li>login
    		<ul>
    			<li><a href="http://localhost/New/login.php">user</a></li>
    		</ul>
    	</li>
    	<li>view
    		<ul>
    		<li><a href="http://localhost/New/view.php"> statement</a></li>
    		<li><a href="http://localhost/New/vstation.php">police station</a></li>
    		<li><a href="http://localhost/New/vwanted.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
</header>
<br/><div class="titl">
<h1>Edit statement portal</h1>
</div>
<a href="http://localhost/New/view.php" class="btn">view statement</a>
<div>
	<form name="form1" method="post" action="edit.php">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>phone number</td>
				<td><input type="text" name="phoneno" value="<?php echo $phoneno;?>"></td>
			</tr>
			<tr> 
				<td>statement</td>
				<td><input type="text" name="statement" value="<?php echo $statement;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="repoid" value="<?php echo $_GET['repoid'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
