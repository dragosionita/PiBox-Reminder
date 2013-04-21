<?php
if (!isset($_SESSION)) {
  session_start();
}
// Open Session

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
		$server='localhost';
		$database='test';
		$uid=null;
		$pwd=null;
		$con=mysql_connect($server, $database, $uid, $pwd) or die(mysql_error());
		mysql_select_db('test');
		// Check connection
		if (mysql_errno())
		{
			echo "Failed to connect to MySQL: " . mysql_error();
		}
		$result = mysql_query(" SELECT * FROM user WHERE username='".$_POST['user']."' AND password = '".md5($_POST['pass'])."' ")or die(mysql_error()); 
		if (mysql_num_rows($result)<1)
		{
			$error_message = "There is a log in error! Please try again!";
		}
		while($row = mysql_fetch_array($result))
		{
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['name'] = $row['name'];
			header('Location: .\message_list.php');	
		}
		mysql_close($con);	
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
    <link href="./extern/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="./extern/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="./css/dashboard.css" rel="stylesheet" media="screen">
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
		<?php if (isset($error_message)) {echo "<span style='color: red; padding: 5px'>".$error_message."</span>";} ?>
      	<form action="login.php" method="post">
			<table>
				<tr>
					<td><label>User</label></td><td><input name='user' type='text'/></td>
				</tr>
				<tr>
					<td><label>Password</label></td><td><input name='pass' type='password'/></td>
				</tr>
				<tr>
					<td></td><td><input type='submit' class="btn btn-primary" name='login' value='Log-In!' /></td>
				</tr>
			</table>
		</form>
      </div>
    </div>


    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./extern/jquery-cookie/jquery-1.9.0.js"></script>
    <script src="./extern/jquery-cookie/jquery.cookie.js"></script>
    <script src="./extern/bootstrap/js/bootstrap.js"></script>
    <script src="./js/backend.js"></script>
    <script src="./js/helper.js"></script>
    <script></script>
  </body>
</html>
