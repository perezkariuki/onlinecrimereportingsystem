<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location:admin_log.php');
}
?>

<?php
// including the database connection file
include_once("../connection.php");

if(isset($_POST['update']))
{	
	$pid = $_POST['pid'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
if(empty($name) || empty($email) || empty($username) || empty($password)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE personnel SET name='$name', email='$email', username='$username',password='$password' WHERE pid=$pid");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: admin_vie.php");
	}
}
?>
<?php
//getting id from url
if (isset($_GET['pid'])){
$pid = $_GET['pid'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM personnel WHERE pid = $pid");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$email = $res['email'];
	$username = $res['username'];
	$password = $res['password'];
}
}
?>
<Doctype html>
<head>	
	<title>Edit Data</title>
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
    	<li><a href="http://localhost/New/logout.php">Logout</a></li>
		</ul>
	</div>
	</header>
	<div class="titl"><br/>
	<h1>Edit Officer</h1>
	</div>
	<a href="admin_vie.php" class="btn">|View created Personel|</a><br/><br/>
	<div>
	<form name="form1" method="post" action="edit_admin.php">
		<table width="48%" border="0" class="portal" align="center">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>username</td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>password</td>
				<td><input type="password" name="password" value="<?php echo $password;?>"></td>
			</tr>
			<tr>
			<td><input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>