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

$online = mysql_query("SELECT count(*) FROM characters WHERE online = '1'") or die(mysql_error());
$online_players = mysql_fetch_array($online);
$online_players = $online_players['count(*)'];

if($online_players < $max_players) {
$total = ($online_players * 100) / $max_players;
$replace = array("," => ".");
$string = $total;
}
else $total = 100;
?>