<?php
	include '../sql_details.php';

	//gets both chat commands and stats
	$base_query = ("SELECT chat_commands FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) {

	$is_enabled = $result['chat_commands'];
		}
		
		
	$stats_query = ("SELECT stats_enabled FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
	$result = mysql_query($stats_query);

	while ($result = mysql_fetch_array($result)) {

	$stats_enabled = $result['stats_enabled'];
		}
		
		
	echo $is_enabled, ("|"), $stats_enabled, ("|"), "a", ("|"), "a", ("|"), "a" ,("|"), "a";


?>