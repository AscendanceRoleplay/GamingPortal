<?php
include 'config.php';

	function show_error($error = "unknown issue") {
	  echo '<div class="nosuccess"><span style="padding-left:25px;color:#FFF;font-weight:bold;">ERROR:</span> ' . $error . ' <div class="n-img"></div></div><br />';
	}
	function locked_error($error = "unknown issue") {
	  echo '<div class="locked"><span style="padding-left:25px;color:#FFF;font-weight:bold;">ERROR:</span> ' . $error . ' <div class="l-img"></div></div><br />';
	}
		
	function vTheme() {
		global $theme, $checker;
		switch ($theme) {
			case 0:
			echo 'nvision';
			break;
			case 1:
			echo 'tvw';
			break;
			case 2:
			echo 'cataclysm';
			break;
			default:
			echo 'nvision';
		}		
	}
		
	function str_replace_assoc($array,$string) {
		$from_array = array();
		$to_array = array();
		
		foreach ($array as $k => $v){
			$from_array[] = $k;
			$to_array[] = $v;
		}
		
		return str_replace($from_array,$to_array,$string);
	}
	
	function xmlStuff() {
		global $xmlfile, $xmldisplay;
		if($xmldisplay != 0) {
			if(file_exists($xmlfile)) {
				$xml = simplexml_load_file($xmlfile);
				
				if($xmldisplay != 2 && $xmldisplay != 3) {
					return "<div align='center'>Uptime: " . $xml->status->uptime . "</div><br /><div align='center'>Online GMs: " . $xml->status->gmcount . "</div><br />";
				}
				if($xmldisplay != 1 && $xmldisplay != 3) {
					return "<div align='center'>Uptime: " . $xml->status->uptime . "</div><br />";
				}
				if($xmldisplay != 2 && $xmldisplay != 1) {
					return "<div align='center'>Online GMs " . $xml->status->gmcount . "</div><br />";
				}
			} else {
				return show_error("Your xml file cannot be found, please insert right settings in config.php");
			}
		}	
	}
	
	function jStyle() {
      global $js;
      echo ($js == 1) ? 'slide' : 'fade';
    }
	
	function displayPlayers() {
		global $show_players, $online_players, $show_all;
		if ($show_players < $online_players) echo 'Displaying random ' . $show_players . ' of ' . $online_players . ' players.';
        if($show_all) echo ' - <a href="#showall" onClick="getOnline(id);">Show All</a>';
		else echo 'Displaying ' . $online_players . ' players.';
	}
	
	function is_valid_email ($email) {
		$qtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		$dtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		$atom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c'.
					'\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		$quoted_pair = '\\x5c\\x00-\\x7f';
		$domain_literal = "\\x5b($dtext|$quoted_pair)*\\x5d";
		$quoted_string = "\\x22($qtext|$quoted_pair)*\\x22";
		$domain_ref = $atom;
		$sub_domain = "($domain_ref|$domain_literal)";
		$word = "($atom|$quoted_string)";
		$domain = "$sub_domain(\\x2e$sub_domain)*";
		$local_part = "$word(\\x2e$word)*";
		$addr_spec = "$local_part\\x40$domain";
	 
		return preg_match("!^$addr_spec$!", $email) ? true : false;
	}
				
	function showPlayersOnline() {
		global $show_players;
		$poquery = mysql_query("SELECT guid, account, name, race, class, gender, level FROM characters WHERE online = '1' ORDER BY RAND() LIMIT {$show_players}");
		
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {

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

			$guildid = mysql_query("SELECT guildid FROM guild_member WHERE guid = '".$row['guid']."'") or die(mysql_error());
			$my_guildid = mysql_fetch_assoc(mysql_query("SELECT guildid FROM guild_member WHERE guid = '".$row['guid']."'"));
			
			$row['guildid']=$my_guildid['guildid'];

			$guild = mysql_query("SELECT name FROM guild WHERE guildid = '".$row['guildid']."'") or die(mysql_error());
			$my_guild = mysql_fetch_assoc(mysql_query("SELECT name FROM guild WHERE guildid = '".$row['guildid']."'"));
			
			$row['guild']=$my_guild['name'];

			$dbcon = @mysql_connect('127.0.0.1', 'root', '5774');
			if (!$dbcon)
			{
				return show_error(mysql_error());
			}
			$dbc = @mysql_select_db(auth, $dbcon);
			if (!$dbc)
			{
				return show_error(mysql_error());
			}

			$gmlevel = mysql_query("SELECT gmlevel FROM account_access WHERE id = '".$row['account']."'") or die(mysql_error());
			$my_gmlevel = mysql_fetch_assoc(mysql_query("SELECT gmlevel FROM account_access WHERE id = '".$row['account']."'"));
			
			$row['account']=$my_gmlevel['gmlevel'];

			if($row['account'] < 3) {
				$staff='&nbsp';
			}
			if($row['account'] >= 3) {
				$staff='<img src="image/staff.png" alt="" />';
			}

				echo '			<tr>
								<td width="185" align="center">'.$staff.'</td>
								<td width="185" align="center"><a href="profile.php?guid='.$row['guid'].'">'.$row['name'].'</a></td>
								<td width="48" align="center"><img src=\'image/stats/'.$row['race'].'-'.$row['gender'].'.gif\'></td>
								<td width="48" align="center"><img src=\'image/stats/'.$row['class'].'.gif\'></td>
								<td width="185" align="center">'.$row['guild'].'</td>
							</tr>';
			}
		} else $error = 'No online characters!';
		
	}

	function showMyCharacters() {
		global $show_characters;
		$poquery = mysql_query("SELECT name, race, class, gender, level FROM characters WHERE account = '".$_SESSION['id']."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {

			$dbcon = @mysql_connect('127.0.0.1', 'root', 'iwMQA22mhU');
			if (!$dbcon)
			{
				return show_error(mysql_error());
			}
			$dbc = @mysql_select_db(characters, $dbcon);
			if (!$dbc)
			{
				return show_error(mysql_error());
			}

			$characters = mysql_query("SELECT guid, name FROM characters WHERE name = '".$row['name']."'") or die(mysql_error());
			$my_characters = mysql_fetch_assoc(mysql_query("SELECT guid, name FROM characters WHERE name = '".$row['name']."'"));
			
			$row['guid']=$my_characters['guid'];


				echo '      <tr>
										<td width="185" align="center"><a href="profile.php?guid='.$row['guid'].'">'.$row['name'].'</a></td>
										<td width="71" align="center"><img src=\'image/stats/'.$row['race'].'-'.$row['gender'].'.gif\'></td>
										<td width="63" align="center"><img src=\'image/stats/'.$row['class'].'.gif\'></td>
										<td width="48" align="center">'.$row['level'].'</td>
										<td width="48" align="center"><a href="editprofile.php?guid='.$row['guid'].'">Edit</a></td>
									</tr>';
			}
		} else $error = 'No characters!';
		
	}
	
	function showAllPlayersOnline() {
		$poquery2 = mysql_query("SELECT name, race, class, gender, level FROM characters WHERE online = '1' ORDER BY RAND()") or die(mysql_error());
		if(mysql_num_rows($poquery2) > 0) {
			while($row =mysql_fetch_array($poquery2)) {
				echo '      <tr>
										<td width="185" align="center">'.$row['name'].'</td>
										<td width="71" align="center"><img src=\'images/stats/'.$row['race'].'-'.$row['gender'].'.gif\'></td>
										<td width="63" align="center"><img src=\'images/stats/'.$row['class'].'.gif\'></td>
										<td width="48" align="center">'.$row['level'].'</td>
									</tr>';
			}
		} else $error = 'No online Characters!';
	}

	function displayCommands() {
		global $show_commands, $your_commands, $show_all_commands;
		if ($show_commands < $your_commands) echo 'Displaying random ' . $show_commands . ' of ' . $your_commands . ' commands.';
        if($show_all_commands) echo ' - <a href="#showall" onClick="getCommands(id);">Show All</a>';
		else echo 'Displaying ' . $your_commands . ' commands.';
	}
	function showCommands() {
		global $show_commands;
		$poquery = mysql_query("SELECT name, help, security FROM command WHERE security <= '".$_SESSION['access']."' ORDER BY name LIMIT {$show_commands}");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '      <tr>
										<td width="48" align="center">'.$row['name'].'</td>
										<td width="48" align="center">'.$row['security'].'</td>
										<td width="185" align="center">'.$row['help'].'</td>
									</tr>';
			}
		} else $error = 'No commands available!';
	}	
	function showAllCommands() {
		$poquery2 = mysql_query("SELECT name, help FROM command WHERE help = '1' ORDER BY RAND()") or die(mysql_error());
		if(mysql_num_rows($poquery2) > 0) {
			while($row =mysql_fetch_array($poquery2)) {
				echo '      <tr>
										<td width="48" align="center">'.$row['name'].'</td>
										<td width="185" align="center">'.$row['help'].'</td>
									</tr>';
			}
		} else $error = 'No available commands!';
	}
	
?>
