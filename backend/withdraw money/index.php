<?php
$player_uid = $_GET['id'];
$player_pid = $_GET['pid'];
include '../sql_details.php';


/*mysql_query("INSERT INTO player_guids (unique_id) VALUES ('$player_uid');") or die(mysql_error());*/
/*mysql_query("UPDATE player_guids SET 'deaths' WHERE unique_id = '$player_uid';") or die(mysql_error()); */



$initial_gold_count_count = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result_initial_gold = mysql_query($initial_gold_count_count);

while ($row = mysql_fetch_array($result_initial_gold)) {

$final_result_initial_gold_counter = $row['gold'];

}

//if the gold in bank is more or equal to 0
mysql_query("UPDATE ai_pw_player_guids SET gold = gold - 5000 WHERE unique_id = '$player_uid' AND gold >= 0 AND withdraw_limit > 0;") or die(mysql_error()); 
//else if the gold in bank is less than 0, set it to 0.
mysql_query("UPDATE ai_pw_player_guids SET gold = 0 WHERE unique_id = '$player_uid' AND gold < 0 AND withdraw_limit >= 0;") or die(mysql_error()); 

$death_count = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$result = mysql_query($death_count);

while ($row = mysql_fetch_array($result)) {

$death_final = $row['gold'];

}


if ($final_result_initial_gold_counter < 5000) {
mysql_query("UPDATE ai_pw_player_guids SET withdraw_limit = withdraw_limit - $final_result_initial_gold_counter  WHERE unique_id = '$player_uid' AND withdraw_limit >= 0 ;") or die(mysql_error()); 

}
else {
mysql_query("UPDATE ai_pw_player_guids SET withdraw_limit = withdraw_limit - 5000  WHERE unique_id = '$player_uid' AND withdraw_limit > 0;") or die(mysql_error()); 
}

//to check if the withdraw limit has gone down to 0 and the player cannot withdraw anymore
$withdraw_limit_after_withdraw = ("SELECT withdraw_limit FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
$withdraw_result_after_withdraw = mysql_query($withdraw_limit_after_withdraw);

while ($row = mysql_fetch_array($withdraw_result_after_withdraw)) {

$withdraw_result_after_withdraw = $row['withdraw_limit'];

}

//stuff set by admin in sql
$withdraw_limit_set_in_options = ("SELECT withdrawal_limit FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$withdraw_database = mysql_query($withdraw_limit_set_in_options);

while ($row = mysql_fetch_array($withdraw_database)) {

$withdraw_limit_max_by_admin = $row['withdrawal_limit'];

}

if ($withdraw_result_after_withdraw <= 0) {
echo $player_pid, ("|"), $withdraw_limit_max_by_admin, ("|"), 0 ;
}

else { 
echo $death_final,("|"), $player_uid, ("|"), $player_pid, ("|"), $final_result_initial_gold_counter  ;
}


mysql_close($con);

?>
