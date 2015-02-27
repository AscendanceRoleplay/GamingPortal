<?php
	function showMyProfileName() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['cname'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileTitle() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['title'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileAge() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['age'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileClass() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['cclass'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileRace() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['crace'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileResidence() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['residence'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileBirthplace() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['birthplace'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileFigure() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['figure'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileHeight() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
						<tr>
							<td width="185" align="center">'.$row['height'].'</td>
						</tr>
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileHistory() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
					'.$row[history].'
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfilePersonality() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
					'.$row[personality].'
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileAppearance() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
					'.$row[appearance].'
				';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileImage() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT image FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo ''.$row[image].'';
			}
		} else $error = 'No characters!';
		
	}
	function showMyProfileEvents() {
		global $show_profile;
		$guid = $_GET['guid'];
		$poquery = mysql_query("SELECT guid, account, cname, title, age, cclass, crace, residence, birthplace, figure, height, history, personality, appearance, events FROM characters WHERE guid = '".$guid."'");
		if(mysql_num_rows($poquery) > 0) {
			while($row =mysql_fetch_array($poquery)) {
				echo '     	
					'.$row[events].'
				';
			}
		} else $error = 'No characters!';
		
	}
?>
