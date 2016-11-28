<?php
$player_uid = $_GET['id'];
$player_pid = $_GET['pid'];
$player_current_scene = $_GET['scene'];

include '../sql_details.php';



$pos_x_init = ("SELECT pos_x FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_pos_x = mysql_query($pos_x_init);

while ($row = mysql_fetch_array($result_pos_x)) {

$position_x_usable = $row['pos_x'];

}

$pos_y_init = ("SELECT pos_y FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_pos_y = mysql_query($pos_y_init);

while ($row = mysql_fetch_array($result_pos_y)) {

$position_y_usable = $row['pos_y'];

}

$pos_z_init = ("SELECT pos_z FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_pos_z = mysql_query($pos_z_init);

while ($row = mysql_fetch_array($result_pos_z)) {

$position_z_usable = $row['pos_z'];

}

$entry_point_init = ("SELECT entry_point FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_entry_point = mysql_query($entry_point_init);

while ($row = mysql_fetch_array($result_entry_point)) {

$entry_point_print = $row['entry_point'];

}

$scene_name_init = ("SELECT last_scene FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$scene_name_result = mysql_query($scene_name_init);

while ($row = mysql_fetch_array($scene_name_result)) {

$scene_name_usable = $row['last_scene'];

}

//$reg0 = 0;


if ($position_x_usable == 0 && $position_y_usable == 0 && $position_z_usable == 0)
{
$check = 0;
}

else if ($player_current_scene == $scene_name_usable)
{
$check = 1;
}

else 
{
$check = 0;
}

if ($check == 1) {
echo $entry_point_print, ("|"), $player_uid, ("|"), $player_pid, ("|"),$position_x_usable, ("|"), $position_y_usable, ("|"), $position_z_usable, ("|"), 0;
}

else if ($check == 0) {
echo $player_pid;
}







mysql_close($con);

?>
