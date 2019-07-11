<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../work/admin.css">
</head>

<body>
<header>
	<div>
	<ul class="links" >
		<li>Home
			<ul>
			<li>
			<a href="http://localhost/New/admin/admin_index.php">Admin_Home</a>
			</li>
			<li>
			<a href="http://localhost/New/index.php">Main Home</a>
			</li>
			</ul>
		</li>
    	<li>login
    		<ul>
    			<li><a href="http://localhost/New/admin/admin_log.php"> admin</a></li>
    			<li><a href="http://localhost/New/personnel/p_login.php">officer</a></li>
    			<li><a href="http://localhost/New/login.php">user</a></li>
    		</ul>
    	</li>
    	<li>view
    		<ul>
    		<li><a href=""> statement</a></li>
    		<li><a href="http://localhost/New/station/station_view.php">police station</a></li>
    		<li><a href="http://localhost/New/wanted/w_view.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/Logout.php">Logout</a></li>
		</ul>
	</div>
</header>
<?php
include("../connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='admin_reg.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO admin(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='admin_log.php'>Login</a>";
	}
} else {
?>
	<div class="titl"><br/>
	<h1><font size="+4">Register</font></h1><br/><br/>
	<div>
	<form name="form1" method="post" action="">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>Full Name<input type="text" name="name" placeholder="Enter your fullname"></td>
			</tr>
			<tr> 
				<td>Email<input type="text" name="email" placeholder="Enter your Email Address"></td>
			</tr>			
			<tr> 
				<td>Username<input type="text" name="username" placeholder="Enter your username"></td>
			</tr>
			<tr> 
				<td>Password<input type="password" name="password" placeholder="Enter your password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
