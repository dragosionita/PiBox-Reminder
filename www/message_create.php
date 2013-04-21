<?php
include 'header.php';

if(isset($_POST['subject']))
{
	if (isset($_POST['save']))
	{
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

        $date = new DateTime($_POST['scheduled']);
        $tms = $date->getTimestamp();
		$query = "insert into reminder (user_id, subject, text, scheduled) values ('".$_SESSION['user_id']."','".$_POST['subject']."','".$_POST['text']."', '".$tms."' ); ";
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
						<a href="./webcam.php">Camera</a>
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
	  <img src='logo.png' height="150" width="280">
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
					<td><label>Scheduled:</label></td><td><input name='scheduled' value='<?php echo date("Y-m-d H:i:s", time()); ?>' id='dp1' type='text'/></td>
				</tr>
				<tr>
					<td></td><td style='text-align:right'><input type='submit' name='save' value='Save' /></td>
				</tr>
			</table>
		</form>
      </div>
    </div>
	<script>
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
					
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker'); 
        
		});
		$('.datepicker').datepicker();
	</script>
<div class="datepicker dropdown-menu" style="display: none; top: 345px; left: 582px;"><div class="datepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">February 2012</th><th class="next">›</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="day  old">29</td><td class="day  old">30</td><td class="day  old">31</td><td class="day ">1</td><td class="day ">2</td><td class="day ">3</td><td class="day ">4</td></tr><tr><td class="day ">5</td><td class="day ">6</td><td class="day ">7</td><td class="day ">8</td><td class="day ">9</td><td class="day ">10</td><td class="day ">11</td></tr><tr><td class="day ">12</td><td class="day ">13</td><td class="day ">14</td><td class="day ">15</td><td class="day  active">16</td><td class="day ">17</td><td class="day ">18</td></tr><tr><td class="day ">19</td><td class="day ">20</td><td class="day ">21</td><td class="day ">22</td><td class="day ">23</td><td class="day ">24</td><td class="day ">25</td></tr><tr><td class="day ">26</td><td class="day ">27</td><td class="day ">28</td><td class="day ">29</td><td class="day  new">1</td><td class="day  new">2</td><td class="day  new">3</td></tr><tr><td class="day  new">4</td><td class="day  new">5</td><td class="day  new">6</td><td class="day  new">7</td><td class="day  new">8</td><td class="day  new">9</td><td class="day  new">10</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2012</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month active">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev">‹</th><th colspan="5" class="switch">2010-2019</th><th class="next">›</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year active">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year old">2020</span></td></tr></tbody></table></div></div>
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
