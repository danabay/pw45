<?php

$player_uid = $_GET['id'];
$player_troop = $_GET['troop'];
$player_faction = $_GET['faction'];
$carried_gold = $_GET['gold'];
$scene_name = $_GET['scene'];
include '../sql_details.php';


mysql_query("UPDATE ai_pw_player_guids SET troop = $player_troop WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET carried_gold = $carried_gold WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET faction = $player_faction WHERE unique_id = '$player_uid';") or die(mysql_error()); 

$decoded_scene_name=htmlentities(mysql_real_escape_string($scene_name));

echo $decoded_scene_name;

mysql_query("UPDATE ai_pw_player_guids SET last_scene = '$decoded_scene_name' WHERE unique_id = '$player_uid';") or die(mysql_error()); 


mysql_close($con);

?>
