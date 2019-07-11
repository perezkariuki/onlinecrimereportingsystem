<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../work/pers.css">
</head>

<body>
<header>
	<div>
    	<ul class="links" >
		<li>Home
             <ul>
            <li>
            <a href="http://localhost/New/index.php">Main Home</a>
            </li>
             <li>
            <a href="http://localhost/New/personnel/index_p.php">Officer Home</a>
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
    		<li><a href="http://localhost/New/vview.php"> statement</a></li>
    		<li><a href="http://localhost/New/station/station_view.php">police station</a></li>
    		<li><a href="http://localhost/New/wanted/w_view.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
    </div>
</header>
<?php
include("../connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='p_login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM personnel WHERE username='$user' AND password=$pass")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['pid'] = $row['pid'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='p_login.php'>Go back</a>";
			header("Refresh:1; url=p_login.php");
		}

		if(isset($_SESSION['valid'])) {
			header("Refresh:1; url=index_p.php");			
		}
	}
} else {
?>
	<div class="titl"><br/>
	<h1>Welcome to the Officer login portal</h1>
	</div>
	<p align="center"><font size="+4">personnel Login</font></p>
	<form name="form1" method="post" action="">
		<table width="48%" border="0" class="portal" align="center">
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
