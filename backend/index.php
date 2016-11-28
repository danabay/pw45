<?php
$player_uid = $_GET['id'];
$player_pid = $_GET['pid'];
$player_uname = $_GET['user'];

include 'sql_details.php';


$withdraw_initial = ("SELECT withdrawal_limit FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$result_withdraw_initial = mysql_query($withdraw_initial);

while ($row = mysql_fetch_array($result_withdraw_initial)) {

$withdrawal_limit = $row['withdrawal_limit'];
}

$deposit_initial = ("SELECT deposit_limit FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$result_deposit_initial = mysql_query($deposit_initial);

while ($row = mysql_fetch_array($result_deposit_initial)) {

$deposit_limit = $row['deposit_limit'];
}



 $d1 = mysql_query("SELECT default_gold_in_bank FROM ai_pw_admin_options LIMIT 1");

while($d1 = mysql_fetch_assoc($d1))
{
$d2 = $d1['default_gold_in_bank'];
if(is_numeric($d2)){
mysql_query("INSERT INTO ai_pw_player_guids (unique_id,name,last_scene,gold,withdraw_limit,deposit_limit,health, troop, carried_gold, pos_x, pos_y, pos_z, hunger) VALUES ('$player_uid','$player_uname', 'none','".$d2."', '$withdrawal_limit', '$deposit_limit', 100, 4, 1000, 0, 0, 0, 0)  ON DUPLICATE KEY UPDATE name = '$player_uname';");
}
}

//set the  pin if not already set 
$pin_initial = ("SELECT pin FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
 $result_pin_init = mysql_query($pin_initial);

 while ($row = mysql_fetch_array($result_pin_init))
 {
	$pin_print = $row['pin'];
 }
 
 //if the pin is 0, that means the pin has not been set yet and we need to set it
 if ($pin_print == 0)
 {
	 //generate a random one from 0 to 999.999
	 $random_pin = rand(1, 999999);
	 mysql_query("UPDATE ai_pw_player_guids SET pin = '$random_pin' WHERE unique_id = '$player_uid'");
	 $pin_print = $random_pin;
 }


$troop_initial = ("SELECT troop FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
 $result_troop_initial = mysql_query($troop_initial);

 while ($row = mysql_fetch_array($result_troop_initial)) {

 $troop_print = $row['troop'];
 }
 


//get carried gold
$carried_gold_initial = ("SELECT carried_gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_carried_gold_initial = mysql_query($carried_gold_initial);

while ($row = mysql_fetch_array($result_carried_gold_initial)) {

$carried_gold_print = $row['carried_gold'];

}


//get player's faction
$faction_initial = ("SELECT faction FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_faction_initial = mysql_query($faction_initial);

while ($row = mysql_fetch_array($result_faction_initial)) {

$faction_print = $row['faction'];

}


//get gold in bank
$gold_initial = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$gold_initial_set = mysql_query($gold_initial);

while ($row = mysql_fetch_array($gold_initial_set)) {
$gold_print = $row['gold'];
}

//get played_time
$time_played_initial = ("SELECT played_time FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$time_played_set = mysql_query($time_played_initial);

while ($row = mysql_fetch_array($time_played_set)) {
$time_usable = $row['played_time'];
}

$kills_init = ("SELECT kills FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$kills_player_set = mysql_query($kills_init);

while ($row = mysql_fetch_array($kills_player_set)) {
$kills_print = $row['kills'];
}

$deaths_init = ("SELECT deaths FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$deaths_player_set = mysql_query($deaths_init);

while ($row = mysql_fetch_array($deaths_player_set)) {
$deaths_print = $row['deaths'];
}

$teamkills_init = ("SELECT teamkills FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$teamkills_player_set = mysql_query($teamkills_init);

while ($row = mysql_fetch_array($teamkills_player_set)) {
$teamkills_print = $row['teamkills'];
}


$time_echo = round($time_usable / 3600, 3);

$time_string = " " . $time_echo;

$k_d_ratio = round ($kills_print / $deaths_print, 3);

$k_d_print = " " . $k_d_ratio;

echo $player_pid, ("|"), $troop_print, ("|"), $carried_gold_print, ("|"), $faction_print, ("|"),  $gold_print, ("|"), $player_uid  ,("|"), $pin_print , ("|"), $kills_print, ("|"), $deaths_print, ("|"), $teamkills_print , ("|"), $time_string, ("|") , $k_d_print ; //last one is string


mysql_close($con);

?>
