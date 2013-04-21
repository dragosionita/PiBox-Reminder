<?php
include 'index.php';

if(isset($_POST['subject']))
{
	if (isset($_POST['save']))
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
		$query = "insert into reminder (user_id, subject, text, scheduled) values ('".$_SESSION['user_id']."','".$_POST['subject']."','".$_POST['text']."', '".$_POST['scheduled']."' ); ";
		$result = mysql_query($query);
		header('Location: .\message_list.php');
	}
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
						<a href="./message_list.php">List Messages</a>
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
	  <h2>Create Message</h2>
		<?php if (isset($error_message)) {echo $error_message;} ?>
      	<form action="#" method="post">
			<table>
				<tr>
					<td><label>Subject:</label></td><td><input name='subject' type='text'/></td>
				</tr>
				<tr>
					<td><label>Text:</label></td><td><textarea name='text'></textarea></td>
				</tr>
				<tr>
					<td><label>Scheduled:</label></td><td><input name='scheduled' type='text'/></td>
				</tr>
				<tr>
					<td></td><td style='text-align:right'><input type='submit' name='save' value='Save' /></td>
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
<?php include 'logout.php'; ?>