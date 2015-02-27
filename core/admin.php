<?php
include 'config.php';

	function showGmAccounts() {
		$poquery = mysql_query("SELECT id, gmlevel FROM account_access") or die(mysql_error());
		if(mysql_num_rows($poquery) > 0) {
			while($row = mysql_fetch_array($poquery)) {
				$poquery2 = mysql_query("SELECT * FROM account WHERE id = '".$row['id']."'") or die(mysql_error());
					while($row2 = mysql_fetch_array($poquery2)) {
						echo '     
							<table width="435">
								<tr>
									<td width="150" align="center">'.$row2['username'].'</td>
									<td width="150" align="center">'.$row['id'].'</td>
									<td width="150" align="center">'.$row['gmlevel'].'</td>
								</tr>
							</table>
						';
					}			
			}
		} else $error = 'No characters!';
	}
?>
