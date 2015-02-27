<?php

$dbcon = @mysql_connect($dbhost, $dbuser, $dbpass);
if (!$dbcon)
{
  return show_error(mysql_error());
}
$dbc = @mysql_select_db($dbworld, $dbcon);
if (!$dbc)
{
  return show_error(mysql_error());
}

$commands = mysql_query("SELECT count(*) FROM command WHERE help != 'NULL'") or die(mysql_error());
$your_commands = mysql_fetch_array($commands);
$your_commands = $your_commands['count(*)'];

if($your_commands < $max_commands) {
$total = ($your_commands * 100) / $max_commands;
$replace = array("," => ".");
$string = $total;
}
else $total = 100;
?>
