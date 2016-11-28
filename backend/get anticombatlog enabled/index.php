<?php
	include '../sql_details.php';

	$base_query = ("SELECT anti_combatlogging_enabled FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) 
	{

	$is_enabled = $result['anti_combatlogging_enabled'];
		}
		
		
	echo $is_enabled, ("|"), "a", ("|"), "a", ("|"), "a";


?>