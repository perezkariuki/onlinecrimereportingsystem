<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link rel= "stylesheet" type="text/css" href ="work/user.css" />
</head>

<body>
	<header>
	<div>
    	<ul class="links" >
		<li><a href="http://localhost/New/index.php">Home</a></li>
    	<li>login
    		<ul>
    			<li><a href="http://localhost/New/admin/admin_log.php"> admin</a></li>
    			<li><a href="http://localhost/New/personnel/p_login.php">officer</a></li>
    			<li><a href="http://localhost/New/login.php">user</a></li>
    		</ul>
    	</li>
    	<li>signup
    		<ul>
    			<li><a href="http://localhost/New/register.php">create</a></li>
    		</ul>
    	</li>
    	<li>view
    		<ul>
    		<li><a href="http://localhost/New/view.php"> statement</a></li>
    		<li><a href="http://localhost/New/vstation.php">police station</a></li>
    		<li><a href="http://localhost/New/vwanted.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="http://localhost/New/contact.html">Contact us</a></li>
    	<li><a href='http://localhost/New/logout.php'>Logout</a></li>
		</ul>
    </div>
	</header>
	<div class="title">
		<h1>Welcome to Online Crime Reporting System</h1>
		<br/>
		<div class="button">
		<a href='view.php' class="btn">View and Add statement</a><br/><br/>
		<a href='http://localhost/New/vstation.php' class="btn">View police station</a><br/><br/>
		<a href='http://localhost/New/vwanted.php' class="btn">View wanted people</a><br/><br/>
		</div>
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <br/>
		
		<br/><br/>
	<?php	
	} else {
		echo "<br/><br/>You must be logged in to view this all page.<br/><br/>";
	}
	?>
	<div id="footer">
	</div>
</body>
</html>
