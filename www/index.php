<style>
.container{margin: auto;}
</style>
<?php

// Open Session
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['logout']))
	{
		session_destroy();
		header('Location: .\login.php');
	}

if(!isset($_SESSION['user_id']))
{
	header('Location: .\login.php');
}
else
{
	echo("<br><br><br><br>Hello, <span style='color: green'>".$_SESSION['name'])."</span>.";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PiBox-Reminder</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="./extern/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="./extern/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="./css/dashboard.css" rel="stylesheet" media="screen">
  </head>
  
  <?php
  $server='localhost';
  $database='pibox';
  $uid='root';
  $pwd='dragos1234';
  
	$con=mysqli_connect($server, $uid, $pwd);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

  ?>
