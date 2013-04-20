<?php
include 'header.php';

if(isset($_POST['user']) && !isset($_POST['pass']))
{
	$error_message = "Please insert your passwor";
}
else if(!isset($_POST['user']) && isset($_POST['pass']))
{
	$error_message = "Please insert your user name";
}
else if(isset($_POST['user']) && isset($_POST['pass']))
{
	$dbhandle = sqlite_open('..\..\..\db\hackathon.sdb');
	
	if (isset($_POST['login']))
	{
		if (!$dbhandle) die ($error);
		$query = "SELECT * FROM reminder WHERE user_fk='1' ";
		$result = sqlite_query($dbhandle, $query);
		if (!$result) die("Cannot execute query.");
		$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
		print_r($row);
	}
	else if (isset($_POST['signup']))
	{
		
	}
	sqlite_close($dbhandle);
	
	$error_message = "Wrong username or password";
	$success_message = "Your are now logged in";
}
?>



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
						<a href="./message_create.php">Create Message</a>
					  </li>
                	  <li>
						<form action="#" method="post"><input type='submit' name='logout' value='Log-Out'\></form>
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
	  <h2>List Messages</h2>
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
					<td><input type='submit' value='Sign-Up' /></td><td><input type='submit' value='Log-In' /></td>
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
