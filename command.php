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
			function getCommands(id) {
			$("#serverstats2").slideUp("medium");
			$.ajax({
			    url: 'js/commands.php',
			    dataType: 'json',
			    async: true,
			    cache: false,
			    success: function (data) {
			  $("#serverstats2").html(data.commands);
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
		<link rel="stylesheet" type="text/css" media="all" href="includes/main.css" />

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
      <div>
        <h1 class="entry-title">Core Commands</h1>

        <div>
          <p>List of GM Commands for the Ascendance Core. This list extracts directly from the database, but not all Security Levels are updated! You must be logged in to view appropriate commands.</p>

          <p><strong><em>This list may not be 100% accurate</em></strong></p>
<!-- Status Start -->
			<?php
			$dbcon = @mysql_connect($dbhost, $dbuser, $dbpass);
				if (!$dbcon)
				{
					return show_error(mysql_error());
				}
			$dbc = @mysql_select_db($dbaccs, $dbcon);
				if (!$dbc)
				{
				return show_error(mysql_error());
				}

			$gmlevel = mysql_query("SELECT gmlevel FROM account_access WHERE id = '".$_SESSION['id']."'") or die(mysql_error());
			$my_gmlevel = mysql_fetch_assoc(mysql_query("SELECT gmlevel FROM account_access WHERE id = '".$_SESSION['id']."'"));
			
			$_SESSION['access']=$my_gmlevel['gmlevel'];
			?>
			<?php include('includes/commands.php');?>
                    <div id="serverstats2">
					<table class="data ajax" id="table_results">
							<tr>
								<th>Name</th>
								
								<th>Security</th>
								
								<th>Help</th>
							</tr>
						</thead>
						<tbody>
                  		<table width="350">
                        	<?php echo showCommands();?>
                       	</table><br />
						<h3 align="center"><?php displayCommands();?></h3> 
					 </table>
                     </div>
<!-- Status Stop -->
                 </div>			
            </div>
	</div>
	</div>
            <div id="con-bot" class="s3-loader"></div>
    </body>
</html>
