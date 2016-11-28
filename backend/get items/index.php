<?php
$player_uid = $_GET['id'];
$player_pid = $_GET['pid'];
include '../sql_details.php';





$item_0 = ("SELECT item_0 FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_item_0 = mysql_query($item_0);

while ($row = mysql_fetch_array($result_item_0)) {

$item_0_print = $row['item_0'];

}

$item_1 = ("SELECT item_1 FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_item_1 = mysql_query($item_1);

while ($row = mysql_fetch_array($result_item_1)) {

$item_1_print = $row['item_1'];

}

$item_2 = ("SELECT item_2 FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_item_2 = mysql_query($item_2);

while ($row = mysql_fetch_array($result_item_2)) {

$item_2_print = $row['item_2'];

}

$item_3 = ("SELECT item_3 FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_item_3 = mysql_query($item_3);

while ($row = mysql_fetch_array($result_item_3)) {

$item_3_print = $row['item_3'];

}


$body_armor = ("SELECT body_armor FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_body_armor = mysql_query($body_armor);

while ($row = mysql_fetch_array($result_body_armor)) {

$body_armor_print = $row['body_armor'];

}

$head_armor = ("SELECT head_armor FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_head_armor = mysql_query($head_armor);

while ($row = mysql_fetch_array($result_head_armor)) {

$head_armor_print = $row['head_armor'];

}


$item_foot_armor = ("SELECT foot_armor FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_foot_armor = mysql_query($item_foot_armor);

while ($row = mysql_fetch_array($result_foot_armor)) {

$foot_armor_print = $row['foot_armor'];

}

$item_gloves_armor = ("SELECT gloves_armor FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_item_gloves_armor = mysql_query($item_gloves_armor);

while ($row = mysql_fetch_array($result_item_gloves_armor)) {

$gloves_armor_print = $row['gloves_armor'];

}

$horse_initial = ("SELECT horse FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_initial_horse = mysql_query($horse_initial);

while ($row = mysql_fetch_array($result_initial_horse)) {

$horse_usable = $row['horse'];

}

$health_initial = ("SELECT health FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_initial_health = mysql_query($health_initial);

while ($row = mysql_fetch_array($result_initial_health)) {

$health_usable = $row['health'];

}

$horse_hp_init = ("SELECT horse_hp FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$horse_hp_res = mysql_query($horse_hp_init);

while ($row = mysql_fetch_array($horse_hp_res)) {

$horse_hp_usable = $row['horse_hp'];

}

$hunger_init = ("SELECT hunger FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$hunger_res = mysql_query($hunger_init);
while ($row = mysql_fetch_array($hunger_res)) {
$hunger_usable = $row['hunger'];

}



echo $player_pid, ("|"), $item_0_print, ("|"),$item_1_print, ("|"),$item_2_print, ("|"),$item_3_print, ("|"), $body_armor_print, ("|"),$head_armor_print, ("|"),$foot_armor_print, ("|"),$gloves_armor_print , ("|"), $horse_usable, ("|"), $health_usable , ("|"), $horse_hp_usable, ("|"), $hunger_usable ;

mysql_close($con);

?>






















