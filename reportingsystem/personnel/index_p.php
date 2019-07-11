<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="../work/pers.css">
</head>

<body>
	<header>
	<div>
    	<ul class="links" >
		<li>Home
            <ul>
            <li>
            <a href="http://localhost/New/index.php">Main Home</a></li>
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
    		<li><a href="http://localhost/New/view.php"> statement</a></li>
    		<li><a href="http://localhost/New/vstation.php">police station</a></li>
    		<li><a href="http://localhost/New/vwanted.php">wanted people</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
    </div>
	</header>
	<div class="title">
		<h1>Welcome to Online Crime Reporting System</h1><br/>
		<div class="button">
		<a href="http://localhost/New/vview.php" class="btn">view report and give feedback</a><br/><br/>
		<a href="http://localhost/New/vstation.php" class="btn">view police station</a><br/><br/>
		<a href="http://localhost/New/vwanted.php" class="btn">View wanted people</a><br/><br/>
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("../connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <br/>
		
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
	}
	?>
	<div id="footer">
	</div>
</body>
</html>
