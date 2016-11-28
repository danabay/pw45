<?php

$player_uid = $_GET['id'];

$player_slot0 = $_GET['item0'];
$player_slot1 = $_GET['item1'];
$player_slot2 = $_GET['item2'];
$player_slot3 = $_GET['item3'];
$player_body = $_GET['body'];
$player_head = $_GET['head'];
$player_foot = $_GET['foot'];
$player_gloves = $_GET['gloves'];
$player_entry_point = $_GET['entry'];
$player_horse= $_GET['horse'];
$pos_x = $_GET['x'];
$pos_y = $_GET['y'];
$pos_z = $_GET['z'];
$player_health = $_GET['health'];
$horse_hp = $_GET['horsehp'];
$hunger = $_GET['hunger'];
$played_time = $_GET['time'];



include '../sql_details.php';


mysql_query("UPDATE ai_pw_player_guids SET item_0 = $player_slot0 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_1 = $player_slot1 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_2 = $player_slot2 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET item_3 = $player_slot3 WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET body_armor = $player_body WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET head_armor = $player_head WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET foot_armor = $player_foot WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET gloves_armor = $player_gloves WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET entry_point = $player_entry_point WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET horse = $player_horse WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_x = $pos_x WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_y = $pos_y WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET pos_z = $pos_z WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET health = $player_health WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET horse_hp = $horse_hp WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET hunger = $hunger WHERE unique_id = '$player_uid';") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET played_time = played_time + $played_time WHERE unique_id = '$player_uid';") or die(mysql_error()); 

 
// echo $player_slot0, " - ",$player_slot1, " - ",$player_slot2, " - ",$player_slot3, " - ",$player_body, " - ",$player_head, " - ",$player_foot, " - ",$player_gloves, 
// " - ",$player_entry_point," - ",$player_horse," - ",$pos_x," - ",$pos_y," - ",$pos_z;

mysql_close($con);

?>
