<?php 
include('core/config.php');
include('core/core.php');
include('core/profile.php');
include('core/panel.php');

$conn = new MySQLi($dbhost, $dbuser, $dbpass, $dbchars) or die('Can not connect to database');
$guid = $_GET['guid'];
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
	<?php
	$conn = new MySQLi($dbhost, $dbuser, $dbpass, $dbchars) or die('Can not connect to database');
	if(isset($_POST['Submit'])){//if the submit button is clicked
	$name = mysql_real_escape_string($_POST['updatename']);
	$title = mysql_real_escape_string($_POST['updatetitle']);
	$age = mysql_real_escape_string($_POST['updateage']);
	$img = mysql_real_escape_string($_POST['updateimg']);
	$class = mysql_real_escape_string($_POST['updateclass']);
	$race = mysql_real_escape_string($_POST['updaterace']);
	$residence = mysql_real_escape_string($_POST['updateresidence']);
	$birthplace = mysql_real_escape_string($_POST['updatebirthplace']);
	$figure = mysql_real_escape_string($_POST['updatefigure']);
	$height = mysql_real_escape_string($_POST['updateheight']);
	$appearance = mysql_real_escape_string($_POST['updateappearance']);
	$history = mysql_real_escape_string($_POST['updatehistory']);
	$personality = mysql_real_escape_string($_POST['updatepersonality']);
	$events = mysql_real_escape_string($_POST['updateevents']);
	$update = "UPDATE characters SET cname='$name', title='$title', age='$age', image='$img', cclass='$class', crace='$race', residence='$residence', birthplace='$birthplace', figure='$figure', height='$height', appearance='$appearance', history='$history', personality='$personality', events='$events' WHERE guid = '$guid'";
	$conn->query($update) or die("Cannot update $update");//update or error
	}
	?>
		<div id="navi">
		</div>
                <div id="first" class="con-bg">
			<?php
			if($_SESSION['id'])
			echo '<div align="center"><h1>Hello, '.$_SESSION['usr'].'!</h1></div>';
			else{ echo '<div align="center"><h1>You are not authorized to be here! Please, <a href="index.php">login</a> and come back later!</h1></div></div></div><div id="con-bot"></div>'; die;}
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
			if($_SESSION['id'])
			{
			$sql = "SELECT * FROM characters WHERE guid = '".$guid."'";
			$result = $conn->query($sql) or die(mysql_error());
			$result2 = $conn->query($sql) or die(mysql_error());
			$query=getenv(QUERY_STRING);
			parse_str($query);
			$row2 = $result2->fetch_assoc();
			}

			if ($row2['account'] != $_SESSION['id']){
			echo '<div align="center"><h1>This character does not belong to you!</h1></div></div></div><div id="con-bot"></div>';
			die;
			}
    			?>
<div align="center">
<h2>Update Profile</h2>
<form action="" method="post">
<?php
while ($row = $result->fetch_assoc()) {?>
<div class="profile" align="center">
<br />
<div class="profilefield">
	<label for="updatename">Name:</label>
	<input type="text" name="updatename" value="<?php echo $row['cname']; ?>">
</div>

<div class="profilefield">
	<label for="updatetitle">Title:</label>
	<input type="text" name="updatetitle" value="<?php echo $row['title']; ?>">
</div>

<div class="profilefield">
	<label for="updateage">Age:</label>
	<input type="text" name="updateage" value="<?php echo $row['age']; ?>">
</div>

<div class="profilefield">
	<label for="updateimg">Avatar:</label>
	<input type="text" name="updateimg"  value="<?php echo $row['image']; ?>">
</div>

<div class="profilefield">
	<label for="updateclass">Class:</label>
	<input type="text" name="updateclass"  value="<?php echo $row['cclass']; ?>">
</div>

<div class="profilefield">
	<label for="updaterace">Race:</label>
	<input type="text" name="updaterace"  value="<?php echo $row['crace']; ?>">
</div>

<div class="profilefield">
	<label for="updateresidence">Residence:</label>
	<input type="text" name="updateresidence"  value="<?php echo $row['residence']; ?>">
</div>

<div class="profilefield">
	<label for="updatebirthplace">Birthplace:</label>
	<input type="text" name="updatebirthplace"  value="<?php echo $row['birthplace']; ?>">
</div>

<div class="profilefield">
	<label for="updatefigure">Figure:</label>
	<input type="text" name="updatefigure"  value="<?php echo $row['figure']; ?>">
</div>

<div class="profilefield">
	<label for="updateheight">Height:</label>
	<input type="text" name="updateheight"  value="<?php echo $row['height']; ?>">
</div>

<div class="profilefield">
	<label for="updateappearance">Appearance:</label>
	<textarea type="text" name="updateappearance"><?php echo $row['appearance']; ?></textarea>
</div>

<div class="profilefield">
	<label for="updatehistory">History:</label>
	<textarea type="text" name="updatehistory"><?php echo $row['history']; ?></textarea>
</div>

<div class="profilefield">
	<label for="updatepeevents">Events:</label>
	<textarea type="text" name="updateevents"><?php echo $row['events']; ?></textarea>
</div>

<div class="profilefield">
	<label for="updatepersonality">Personality:</label>
	<textarea type="text" name="updatepersonality"><?php echo $row['personality']; ?></textarea>
</div>

<div class="submit"><INPUT TYPE="Submit" VALUE="" NAME="Submit"></div>
</div>
<?php }
?>
</form>
</div>
	</div>
	</div>		
	<div id="con-bot" class="s3-loader"></div>
	</body>
</html>
