<?php

// Open Session
if (!isset($_SESSION)) {
  session_start();
}

if(!isset($_POST['location']))
{
	$error_message = "Please define your location";
}
else if(!isset($_POST['nume']))
{
	$error_message = "Please insert your name";
}
else if(isset($_POST['pass']) && isset($_POST['pass1']) && ($_POST['pass'] != $_POST['pass1']))
{
	$error_message = "Different passwords";
}
else if(!isset($_POST['pass']))
{
	$error_message = "Please insert your password";
}
else if(!isset($_POST['pass']))
{
	$error_message = "Please insert a username";
}
else if(isset($_POST['user']) && isset($_POST['pass']))
{
	if (isset($_POST['signup']))
	{
		$dbhandle = sqlite_open('..\..\db\hackathon.sdb');

		$query = "SELECT * FROM user WHERE username='".$_POST['user']."' ";
		$result = sqlite_query($dbhandle, $query);
		if (!$result) die("Cannot execute query.");
		$row = sqlite_fetch_array($result, SQLITE_ASSOC);
		if ($row['user_id'] > 0)
		{
			//echo("<br><br><br><br><br><br><br>");
			//print_r($row['user_id']);
			$error_message = "User name not available!";
		}
		else
		{	
			//$query = "insert into user (location, name, username, password) values ('".$_POST['location']."','".$_POST['nume']."','".$_POST['user']."', '".$_POST['pass']."' )";
			$query = "insert into user (name, username, password) values ('".$_POST['nume']."','".$_POST['user']."', '".$_POST['pass']."' )";
			$result = sqlite_query($dbhandle, $query) or die("duplicate");
			if (!$result) die("Cannot execute query.");
			$row = sqlite_fetch_array($result, SQLITE_ASSOC);
			print_r($row);
			$query = "SELECT * FROM user WHERE username='".$_POST['user']."' ";
			$result = sqlite_query($dbhandle, $query) or die("duplicate");
			if (!$result) die("Cannot execute query.");
			$row = sqlite_fetch_array($result, SQLITE_ASSOC);
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['name'] = $row['name'];
		
			sqlite_close($dbhandle);
			
			header('Location: .\message_create.php');
		}
	}
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Hackathon 20</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../extern/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="../extern/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="../css/dashboard.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div id="id-cockpit-bar" class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"></a>
          <div class="nav-collapse collapse">
            <ul id="id-group-bar" class="nav">
              
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="id_user">Menu</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
					  <li>
						<a href="./login.php">Log-In</a>
					  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="jumbotron subhead" id="overview">
      <div class="container">
        <p class="lead"></p>
      </div>
    </header>

    <div class="container">
      <div id="id-operative-area" class="row">
	  <br>
	  <h2>Sign-Up</h2>
		<?php if (isset($error_message)) {echo $error_message;} ?>
      	<form action="#" method="post">
			<table>
				<tr>
					<td><label>Name: </label></td><td><input name='nume' type='text'/></td>
				</tr>
				<tr>
					<td><label>Location: </label></td><td><select name='location'><option>Bucuresti</option><option>Cluj</option><option>Craiova</option><option>Iasi</option><option>Timisoara</option></select></td>
				</tr>
				<tr>
					<td><label>Username: </label></td><td><input name='user' type='text'/></td>
				</tr>
				<tr>
					<td><label>Password: </label></td><td><input name='pass' type='password'/></td>
				</tr>
				<tr>
					<td><label>Password: </label></td><td><input name='pass1' type='password'/></td>
				</tr>
				<tr>
					<td></td><td><input type='submit' name='signup' value='Sign-Up!' /></td>
				</tr>
			</table>
		</form>
      </div>
    </div>


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../extern/jquery-cookie/jquery-1.9.0.js"></script>
    <script src="../extern/jquery-cookie/jquery.cookie.js"></script>
    <script src="../extern/bootstrap/js/bootstrap.js"></script>
    <script src="../js/backend.js"></script>
    <script src="../js/helper.js"></script>
    <script></script>
  </body>
</html>
