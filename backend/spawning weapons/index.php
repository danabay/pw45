<?php
include '../sql_details.php';

$player_pid = $_GET['pid'];

$weapons_enabled = ("SELECT spawn_with_weapons FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$result_weapons_enabled = mysql_query($weapons_enabled);

while ($row = mysql_fetch_array($result_weapons_enabled)) {

$weapons_enabled_usable = $row['spawn_with_weapons'];

}

if ($weapons_enabled_usable == 1) {

echo $player_pid, ("|"), "a";

}




?>