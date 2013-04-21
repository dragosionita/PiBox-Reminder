<?php
include 'header.php';		
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
						<a href="./webcam.php">Camera</a>
					  </li>
                	  <li>
						<form action="#" method="post"><input type='submit' class="btn btn-primary" name='logout' value='Log-Out'\></form>
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

    <div class="container" style="margin:0 auto; width:250px">
      <div id="id-operative-area" class="row">
	  <br>
	  <img src='logo.png' height="150" width="280">
	  <h2>List Messages</h2>
		<?php
		$server='localhost';
		$database='pibox';
		$uid='root';
		$pwd='dragos1234';
		$con=mysql_connect($server, $uid, $pwd) or die(mysql_error());
		mysql_select_db('pibox');
		// Check connection
		if (mysql_errno())
		{
			echo "Failed to connect to MySQL: " . mysql_error();
		}
		$result = mysql_query(" SELECT * FROM reminder WHERE user_id='".$_SESSION['user_id']."' ")or die(mysql_error()); 
		//$result = mysql_query(" SELECT * FROM reminder ")or die(mysql_error()); 
		if (mysql_num_rows($result)<1)
		{
			$error_message = "You have no messages !";
		}
		else
		{
							
			echo('<table clas="table" style="border: 1 solid gray"><tr><th></th><th>Your message list</th></tr>');
			while($row = mysql_fetch_array($result))
			{
				echo('<tr style="border: 1 solid red"><td style="color: blue">Subject</td><td style="color: red">'.$row['subject'].'</td></tr><tr><td>Text</td><td>'.$row['text'].'</td></tr><tr><td>Scheduled</td><td>'.$datetime = date("Y-m-d H:i:s", $row['scheduled']).'</td></tr>');
			}
			echo('</table>');
			
		}
		?>
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
