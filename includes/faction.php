<?php
$my_host = "127.0.0.1"; //MySQL Hostname
$my_user = "root"; //MySQL Username
$my_pass = "****"; //MySQL Password
$my_char = "characters"; //Characters Database

$bar_width = "236px";
$bar_height = "20px";
$ally_img = "./image/ally.png";
$horde_img = "./image/horde.png";

$show_percent = true; //Show percent online (true = yes, false = no)

$alliance = array("1","3","4","7","11","12","22");
$horde = array("2","5","6","8","10","9");

define("QFAIL","Unable to run query.");
define("CFAIL","Database connection failed! Check your settings!");
define("DFAIL","Unable to select database.");

$conn = @mysql_connect($my_host,$my_user,$my_pass) or die(mysql_error());
if(!$conn)
    die(CFAIL);
	
function getPlayers($my_char,$conn) {
    $db = @mysql_select_db($my_char,$conn);
	if(!$db) {
	    die(DFAIL);
	}
	$query = @mysql_query("SELECT online FROM characters WHERE online = '1'");
	if(!$query) {
	    die(QFAIL);
	}
	return @mysql_num_rows($query);
}

function doFaction($my_char,$conn,$a) {
    $db = @mysql_select_db($my_char,$conn);
	if(!$db) {
	    die(DFAIL);
	}
	$query = @mysql_query("SELECT race FROM characters WHERE online = '1'");
	if(!$query) {
	    die(QFAIL);
	}
	$i = 0;
	while($r = @mysql_fetch_array($query)) {
	    $race = $r['race'];
		if(in_array($race,$a)) {
		    $i++;
		}
	}
	return $i;
}

function percent($a,$t) {
    $count1 = $a / $t;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    return $count;
}

function barWidth($a,$b,$t) {
    if(($a == 0) && ($b == 0)) {
	    $count2 = "118";
	}
	else {
        $count1 = $a / $b;
	    $count2 = $count1 * $t;
	}
	return $count2;
}

$p = @getPlayers($my_char,$conn);
$a = @doFaction($my_char,$conn,$alliance);
$h = @doFaction($my_char,$conn,$horde);
$ap = @percent($a,$p);
$hp = @percent($h,$p);
$b = @barWidth($a,$p,118);
$c = @barWidth($h,$p,118);
echo "<div style=\"width:" . $bar_width . ";height:" . $bar_height . ";\">
<div style=\"float:left;text-align:right;background:url(./" . $ally_img . ");width:" . $b . "px;height:20px;\">";
if($show_percent) {
    echo "<font style=\"color:#FFFFFF;font-weight:bold;\">$ap%</font>";
}
echo "</div>
<div style=\"float:right;text-align:left;background:url(./" . $horde_img . ");background-position:right;width:" . $c . "px;height:20px;\">";
if($show_percent) {
    echo "<font style=\"color:#FFFFFF;font-weight:bold;\">$hp%</font>";
}
echo "</div>
</div>";
?>