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
                	  	<a href="./message_list.php">Message List</a>
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
	  <h2>Webcam</h2>
		<img src="http://10.10.0.13:8090/?action=stream" width="752">
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
