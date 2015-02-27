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
		<script type='text/javascript' src='js/dynamicpage.js'></script>

 		<script src="js/pace.js"></script>
 		<link href="style/pace.css" rel="stylesheet" />
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
<!-- Status Start -->
                <h2 align="center">Server Status:

                <?php
				if (!$socket = @fsockopen("127.0.0.1", 8085, $errno, $errstr, 30))
				{
					if ($socket = @fsockopen("127.0.0.1", 3724, $errno, $errstr, 30))
					{
						echo "<font color='yellow'><strong>Booting!</strong></font>";
					}
					else
					echo "<font color='red'><strong>Offline!</strong></font>";
				}
				else 
				{
  				echo "<font color='green'><strong>Online!</strong></font>";
  		

 				fclose($socket);
				}

				?>
                </h2>

		</h2>
                <div class="sep"></div>
                        <?php echo xmlStuff();?>
                    <div id="serverstats">
			<?php include('includes/status.php');?>
                      <div id="counter-bg">
                            <div id="counter" style="width:<?php echo $string;?>%;"></div><br />
                            <?php echo $online_players . '/' . $max_players . ' Players Online';?></div>
                    </div><br />
                <div align="center">
                	<?php include('includes/faction.php');?>
                </div align="center">
                    <div id="serverstats2">
                    	<table width="651">
                        <tr>
				<td width="185" align="center">&nbsp</td>
				<td width="185" align="center"><h3>Name</h3></td>
				<td width="48" align="center"><h3>Race</h3></td>
				<td width="48" align="center"><h3>Class</h3></td>
				<td width="185" align="center"><h3>Guild</h3></td>
                        </tr>
                       	</table>
                        <div class="sep"></div>
                  	<table width="651">
                        <?php echo showPlayersOnline();?>
                       	</table><br />
						<h3 align="center"><?php displayPlayers();?></h3>                    
                     </div>
<!-- Status Stop -->
                 </div>			
            </div>
            <div id="con-bot" class="s3-loader"></div>
    </body>
</html>