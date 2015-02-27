<?php 
error_reporting(E_ALL);
include('core/config.php');
include('core/core.php');

session_start();

require_once('core/membership.php');
$membership = new Membership();

if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

if($_POST && !empty($_POST['username']) && !empty($_POST['pwd']))
{
	$response = $membership->validate_user($_POST['username'], $_POST['pwd']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ascendance - User Login</title>
        <link href="style/main.css" rel="stylesheet" type="text/css" />
        <link href="style/theme/<?php echo vTheme();?>.css" rel="stylesheet" type="text/css" />
        <!--<script type="text/javascript" src="js/jquery.js"></script>-->
		<script type="text/javascript" src="js/<?php echo jStyle();?>.js"></script>
		<script type="text/javascript">
			function getOnline(id) {
			$("#serverstats2").slideUp("medium");
			$.ajax({
			    url: 'js/online.php',
			    dataType: 'json',
			    async: true,
			    cache: false,
			    success: function (data) {
			  $("#serverstats2").html(data.online);
			  setTimeout(function() { $("#serverstats2").slideDown("slow"); }, 500);
			    }
			})
			}
		</script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
   	 	<script type='text/javascript' src='js/jquery.ba-hashchange.min.js'></script>
    	<script type='text/javascript' src='js/dynamicpage.js'></script>

    </head>

    <body>
    	<div class="menu">
        	<ul>
			<li><a href="index.php">Home</a></li>
       		<li><a href="status.php">Status</a></li>
       	 	<li><a href="create.php">Register</a></li>
        	<li><a href="../forums" id="large">Forums</a></li>
        	<li><a href="connection.php">Connection</a></li>
        	<li><a href="login.php">Login</a></li>
        	<li><a href="http://www.neo-terra.net/forums/index.php?action=forum" id="last">Neo-Terra</a></li>
        	</ul>
    	</div>
        <div id="logo"></div>
		<div id="content">
				 <div id="navi"></div>
   	             <div id="first" class="con-bg">
<!-- Login Start -->
<div id="acc">
<form method="post" action="">
	<h2>Enter your Credentials</h2>
	<p>
		<label for="name">Username: </label>
		<input type="text" name="username" />
	</p>
	<p>
		<label for="pwd">Password: </label>
		<input type="password" name="pwd" />
	</p>
	<p>
	<br />
		<input type="submit" id="submit" value="" name="submit" />
	</p>	
</form>
<br />
</div>
<?php if(isset($response)) echo "<h4 class='nosuccess'>" . $response . "</h4>";?>

<!-- Login Stop -->
                 </div>			
            </div>
            <div id="con-bot"></div>
    </body>
</html>