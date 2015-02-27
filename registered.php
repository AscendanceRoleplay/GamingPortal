<?php 
include('core/config.php');
include('core/core.php');
include('core/panel.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ascendance - Home</title>
        <link href="style/main.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/slider.js"></script>
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
 		<script src="js/pace.js"></script>
 		<link href="style/pace.css" rel="stylesheet" />
    	<script type='text/javascript' src='js/dynamicpage.js'></script>

	<!-- stylesheets -->
  	<!--<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />-->
  	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
	
  	<!-- PNG FIX for IE6 -->
  	<!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
	<!--[if lte IE 6]>
		<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
	<![endif]-->
	 
   	<!-- jQuery - the core -->
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="js/slide.js" type="text/javascript"></script>

    	</head>
	<body>
	<?php 
	include('includes/panel.php');
	include('includes/menu.php');
	?>

        <div id="logo"></div>
		<div id="content" class="s3-loader">
				<div id="navi"></div>
                <div id="first" class="con-bg">
                <div id="con-bg" class="title">
		    <div align="center"><?php
			if($_SESSION['id'])
			echo '<h1>Hello, '.$_SESSION['usr'].'!</h1>';
			else echo '<h1>Please, <a href="index.php">login</a> and come back later!</h1>';

			$dbcon = @mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$dbcon)
				{
					return show_error(mysql_error());
				}
			$dbc = @mysql_select_db($dbchars, $dbcon);
				if (!$dbc)
				{
				return show_error(mysql_error());
				}

			$characters = mysql_query("SELECT guid, name FROM characters WHERE account = '".$_SESSION['id']."'") or die(mysql_error());
			$my_characters = mysql_fetch_assoc(mysql_query("SELECT guid, name FROM characters WHERE account = '".$_SESSION['id']."'"));
			$row['guid']=$my_characters['guid'];
    			?></div>
		<div align="center">
		<br />
		<h3>Your Characters:</h3>
		<br />
		<table width="435">
                        <tr>
                        <td width="185"  align="center"><h3>Name</h3></td>
                        <td width="71" align="center"><h3>Race</h3></td>
                        <td width="63" align="center"><h3>Class</h3></td>
                	<td width="48" align="center"><h3>Level</h3></td>
                	<td width="48" align="center"><h3>Profile</h3></td>
                	</tr>
                </table>
		<table width="435">
                	<?php echo showMyCharacters();?>
                </table><br />
		</div>
                </div>
                </div>		
            </div>
        </div>
    </div>
<div id="con-bot" class="s3-loader"></div>
</body>
</html>
