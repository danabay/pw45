<?php
$player_guid = $_GET['guid'];

include('../sql_details.php');
//overall
mysql_query("UPDATE ai_pw_player_guids SET deaths= deaths + 1 WHERE unique_id = '$player_guid'");
//monthly

?>