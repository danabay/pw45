<?php

$player_uid = $_GET['id'];


include '../sql_details.php';


mysql_query("UPDATE ai_pw_player_guids SET item_0 = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_1 = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_2 = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_3 = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET body_armor = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET head_armor = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET foot_armor = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET gloves_armor = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET horse = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_x = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_y = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_z = 0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 


mysql_close($con);

?>
