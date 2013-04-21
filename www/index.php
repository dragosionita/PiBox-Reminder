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
	header('Location: .\message_create.php');
}
?>