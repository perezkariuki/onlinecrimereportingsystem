<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link rel= "stylesheet" type="text/css" href ="../work/admin.css" />
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
			<a href="http://localhost/New/index.php">Main Home</a></li>
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
    	<li><a href='http://localhost/New/logout.php'>Logout</a></li>
		</ul>
	</div>
	</header>
		<div class="title">
		<h1>Welcome to my page add your report statement admin!</h1>
		<br/>
		<div class="button">
		<a href='admin_vie.php' class="btn">View and Add personel</a><br/><br/>
		<a href='http://localhost/New/wanted/w_view.php' class="btn">View and Add wanted persons</a><br/><br/>
		<a href='http://localhost/New/station/station_view.php' class="btn">View and Add police station</a><br/><br/>
		<a href='http://localhost/New/vview.php' class="btn">View and give report feedback</a><br/><br/>
		</div>
		</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("../connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM admin");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='http://localhost/New/logout.php'>Logout</a><br/>
		
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a href='admin_log.php'>Login</a> | <a href='admin_reg.php'>Register</a>";
	}
	?>
	<div id="footer">
	</div>
</body>
</html>
