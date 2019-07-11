<?php session_start(); ?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM station ORDER BY sid DESC");
?>

<html>
<head>
	<title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="work/ofus.css">
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
    	<li>Report
    		<ul>
    			<li><a href="http://localhost/New/add.html"> Add report</a></li>
    		</ul>
    	</li>
    	<li><a href="#">Contact us</a></li>
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
    </div>
</header>
    <div class=""><br/><br/>
	<h1 align="center"><font size="+4">station locations </font></h1>
    </div>
    <div class="tabs" >
	<table width="10%" border=0 class="tab">
		<tr bgcolor='#CCCCCC'>
			<td>name</td>
			<td>location</td>
		</tr>
		<?php
		while($_POST = mysqli_fetch_array($result)){		
			echo "<tr>";
			echo "<td>".$_POST['name']."</td>";
			echo "<td>".$_POST['location']."</td>";
			echo "</tr>";		
		}
		?>
	</table>
    </div>	
</body>
</html>
