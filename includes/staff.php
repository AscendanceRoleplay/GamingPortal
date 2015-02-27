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

	if($_SESSION['access'] == 0) {
		$staff='&nbsp';
	}
	if($_SESSION['access'] >= 1) {
		$staff='<img src="image/staff.png" alt="" />';
	}
?>