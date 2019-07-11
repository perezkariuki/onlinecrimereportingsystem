<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="work/user.css">
</head>

<body>
	<header class="main">
	  <ul class="navbar" >
	    <li><a href="index.php">Home</a> 
		<li><a href="login.php">Signin</a>
	    <li><a href="register.php">SignUp</a></li>
	    <li><a href="add.php">report</a>
	    <li><a href="view.php">view report</a>
	  </ul>
	</header>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
		header("Refresh:1; url=login.php");
	}
} else {
?>
	<div class="titl"><br/>
	<p align="center"><font size="+4">Register</font></p>
	</div>
	<div>
	<form name="form1" method="post" action="">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>Full Name</td>
				<td><input type="text" name="name" placeholder="Enter Fullname"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" placeholder="Enter Email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" placeholder="Enter username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter password"></td>
			</tr>

			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
</div>
<?php
}
?>
</body>
</html>
