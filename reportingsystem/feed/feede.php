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
	$fid = $_POST['fid'];
	$nameoff = $_POST['nameoff'];
	$offno = $_POST['offno'];
	$fbstate = $_POST['fbstate'];	

if(empty($nameoff) || empty($offno)|| empty($fbstate)) {

	$nameoff = $_POST['nameoff'];
	$offno = $_POST['offno'];
	$fbstate = $_POST['fbstate'];
				
		if(empty($nameoff)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($offno)) {
			echo "<font color='red'>Serialno. field is empty.</font><br/>";
		}
		if(empty($fbstate)) {
			echo "<font color='red'>Statement field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE feedback SET nameoff='$nameoff', offno='$offno',fbstate='$fbstate' WHERE fid=$fid");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: feedv.php");
	}
}
?>
<?php
if (isset($_GET['fid'])){
$fid = $_GET['fid'];
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM feedback WHERE fid = $fid");

while($res = mysqli_fetch_array($result))
{
	$nameoff = $res['nameoff'];
	$offno = $res['offno'];
	$fbstate = $res['fbstate'];
}
}
?>
<Doctype html>
<head>	
	<title>Edit Data</title>
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
	<h1>Feedback Editing portal</h1><br/>
	<a href="feedv.php">|View Feedback|</a>
	<br/>
	
	<form name="form1" method="post" action="feede.php">
		<table border="0">
			<tr> 
				<td>Name of the office</td>
				<td><input type="text" name="nameoff" value="<?php echo $nameoff;?>"></td>
			</tr>
			<tr> 
				<td>officer serialno.</td>
				<td><input type="text" name="offno" value="<?php echo $offno;?>"></td>
			</tr>
			<tr> 
				<td>statement feedback</td>
				<td><input type="text" name="fbstate" value="<?php echo $fbstate;?>"></td>
			</tr>
			<tr>
			<td><input type="hidden" name="fid" value="<?php echo $_GET['fid'];?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>