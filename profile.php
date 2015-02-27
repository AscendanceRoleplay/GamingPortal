<?php 
include('core/config.php');
include('core/core.php');
include('core/profile.php');
include('core/panel.php');

$conn = new MySQLi($dbhost, $dbuser, $dbpass, $dbchars) or die('Can not connect to database');

function showCharacterProfiles() {
	$dbcon = @mysql_connect('127.0.0.1', 'root', '5774');
	if (!$dbcon)
	{
		return show_error(mysql_error());
	}
	$dbc = @mysql_select_db(characters, $dbcon);
	if (!$dbc)
	{
		return show_error(mysql_error());
	}
	$poquery2 = mysql_query("SELECT guid, cname FROM characters WHERE cname IS NOT NULL ORDER BY RAND()") or die(mysql_error());
	if(mysql_num_rows($poquery2) > 0) {
		while($row =mysql_fetch_array($poquery2)) {
			echo '	<tr>
					<td width="185" align="center"><a href="profile.php?guid='.$row['guid'].'">'.$row['cname'].'</a></td>
				</tr>';
		}
	} else $error = 'No online Characters!';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ascendance - Home</title>
        <link href="style/main.css" rel="stylesheet" type="text/css" />
	<link href="style/tabs.css" rel="stylesheet" type="text/css" />
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

	<script type="text/javascript" src="js/tabs.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    	</head>
	<body>
	<?php 
	include('includes/panel.php');
	include('includes/menu.php');
	?>

        <div id="logo"></div>
		<div id="content" class="s3-loader">
		<?php
		if (!$_GET['guid'] && !$_GET['charname']){
			echo '
				<div id="navi"></div>
		                <div id="first" class="con-bg">
             			<div id="con-bg" class="title">
					<div align="center"><h2>Welcome to the Ascendance Character Profiles Section!</h2>
					<br />
					<br />
					<h3>Here you are able to look up account profiles!</h3>
					<br />
					<br />
					<form action="" method="get">
						Character Name:
						<br />
						<br />
						<input type="text" name="charname">
						<br />
						<br />
						<input type="submit" value="">
					</form> 
					<br />
					<br />
					<h3>Alternatively, you can select a character from the list below.</h3>
					<br />
					<br />
                    			<table width="185">
                     				<tr>
							<td width="185" align="center"><h3>Characters</h3></td>
                       				</tr>
                       			</table>
					<div class="sep"></div>
                    			<table width="185" style="margin-top:-30px;">
                     				<tr>';
							echo showCharacterProfiles();
						echo '
                       				</tr>
                       			</table>
					</div>
				</div>
				</div>
				<div id="con-bot" class="s3-loader"></div>
				</body>
				</html>
			';
			die;
		}
		else{
			$guid = $_GET['guid'];
			$charname = $_GET['charname'];
		};
		
		if($charname){
			$search = "SELECT * FROM characters WHERE cname = '".mysql_real_escape_string($charname)."'";
			$feedback = $conn->query($search) or die(mysql_error());
			$feedback2 = $conn->query($search) or die(mysql_error());
			$pulse=getenv(QUERY_STRING);
			parse_str($pulse);
			$info2 = $feedback2->fetch_assoc();	
			$guid = $info2['guid'];
			if(!$guid){
			$search = "SELECT * FROM characters WHERE name = '".mysql_real_escape_string($charname)."'";
			$feedback = $conn->query($search) or die(mysql_error());
			$feedback2 = $conn->query($search) or die(mysql_error());
			$pulse=getenv(QUERY_STRING);
			parse_str($pulse);
			$info2 = $feedback2->fetch_assoc();	
			$guid = $info2['guid'];
			if(!$guid){
				echo '				<div id="navi"></div>
		                <div id="first" class="con-bg">
             			<div id="con-bg" class="title">
					<div align="center">The character you have requested does not exist!
					<br />
					<br />
					If you are having issues, note that TRP names do not dictate the names in our system. Character names are Case Sensitive, Profile Names are not.
					<br />
					<br />
					Here you are able to look up account profiles!
					<br />
					<br />
					<form action="" method="get">
						Character Name:
						<br />
						<input type="text" name="charname">
						<br />
						<input type="submit" value="">
					</form> 
					</div>
				</div>
				</div>
				<div id="con-bot" class="s3-loader"></div>
				</body>
				</html>
				';
				die;
			}
			else{
				echo '
				<script language="javascript">
   					window.location.href = "/portal/profile.php?guid='.$guid.'"
				</script>
				';
			}
			}
			else{
				echo '
				<script language="javascript">
   					window.location.href = "/portal/profile.php?guid='.$guid.'"
				</script>
				';
			}
		}
		?>
		<div id="navi">
		<?php
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
			if($_SESSION['id']){
			$sql = "SELECT * FROM characters WHERE guid = '".$guid."'";
			$result = $conn->query($sql) or die(mysql_error());
			$result2 = $conn->query($sql) or die(mysql_error());
			$query=getenv(QUERY_STRING);
			parse_str($query);
			$row2 = $result2->fetch_assoc();
			}
			if ($row2['account'] == $_SESSION['id']){
			echo '<div align="right" class="editprofile"><a href="editprofile.php?guid='.$guid.'">Edit '.$row2['name'].'\'s Profile</a></div>';
			}
		?>
		</div>
                <div id="first" class="con-bg">
                <div id="con-bg" class="title">
		    <div align="center"><?php
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
    			?></div>
		<div align="center">
		<br />
		</div>
		<div id="con-bg" class="profile-left" align="left">
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Name</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileName();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Title</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileTitle();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Age</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileAge();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Class</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileClass();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Race</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileRace();?>
                </table><br />
		</div>
		<div id="con-bg" class="profile-right" align="left">
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Residence</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileResidence();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Birthplace</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileBirthplace();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Figure</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileFigure();?>
                </table><br />
		<table width="185">
                        <tr>
                        <td width="185"  align="center"><h3>Height</h3></td>
			</tr>
                </table>
		<table width="185">
                	<?php echo showMyProfileHeight();?>
                </table><br />
		</div>
		<div id="con-bg" class="profile-main" align="center">

		<div class="htmltabs">
		<ul class="htmltab-links">
		        <li class="active"><a href="#htmltab1">Appearance</a></li>
		        <li><a href="#htmltab2">History</a></li>
		        <li><a href="#htmltab3">Personality</a></li>
			<li><a href="#htmltab4">Events</a></li>
		</ul>
 
		<div class="htmltab-content">
			<div id="htmltab1" class="htmltab active">
				<?php echo showMyProfileAppearance();?>
			</div>
		 
			<div id="htmltab2" class="htmltab">
				<?php echo showMyProfileHistory();?>
			</div>
 
			<div id="htmltab3" class="htmltab">
				<?php echo showMyProfilePersonality();?>
			</div>

			<div id="htmltab4" class="htmltab">
				<?php echo showMyProfileEvents();?>
			</div>
		</div>
		</div>

		</div>
		<div id="con-bg" class="profile-avatar" align="center">
			<div align="center">
			<img src="<?php echo showMyProfileImage();?>" alt"test"></img>
			</div>
		</div>
                </div>
                </div>	
            </div>
       	<div id="con-bot" class="s3-loader"></div>
    </body>
</html>
