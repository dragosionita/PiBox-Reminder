<?php

// Open Session
if (!isset($_SESSION)) {
  session_start();
}

if(isset($_POST['user']) && !isset($_POST['pass']))
{
	$error_message = "Please insert your passwor";
}
else if(!isset($_POST['user']) && isset($_POST['pass']))
{
	$error_message = "Please insert your user name";
}
		
if(isset($_POST['user']) && isset($_POST['pass']))
{
	if (isset($_POST['login']))
	{
		//$dbhandle = sqlite_open('..\..\db\hackathon.sdb');
        $dbhandle = new SQLite3('../db/mysqlitedb.db');
		if (!$dbhandle) die ($error);
		$query = "SELECT * FROM user WHERE username='".$_POST['user']."' AND password = '".$_POST['pass']."' ";
		$result = sqlite_query($dbhandle, $query);
		if (!$result) die("Cannot execute query.");
		$row = sqlite_fetch_array($result, SQLITE_ASSOC);
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['name'] = $row['name'];
		sqlite_close($dbhandle);
		header('Location: .\message_list.php');
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
						<a href="./signup.php">Sign-Up</a>
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
	  <h2>Log-In</h2>
		<?php if (isset($error_message)) {echo $error_message;} ?>
      	<form action="#" method="post">
			<table>
				<tr>
					<td><label>User</label></td><td><input name='user' type='text'/></td>
				</tr>
				<tr>
					<td><label>Password</label></td><td><input name='pass' type='password'/></td>
				</tr>
				<tr>
					<td></td><td><input type='submit' name='login' value='Log-In!' /></td>
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
