<?php
//$act = $_GET['act'];
//$agent_id1 = $_GET['agent1'];
//$agent_id2 = $_GET['agent2'];
include '../sql_details.php';

$combatlog_init = ("SELECT combatlogging_timer FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$combatlog_result = mysql_query($combatlog_init);

while ($row = mysql_fetch_array($combatlog_result)) {

$combatlog_timer_usable = $row['combatlogging_timer'];
}

$salary_init = ("SELECT anti_combatlogging_enabled FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
$salary_result = mysql_query($salary_init);

while ($row = mysql_fetch_array($salary_result)) {

$anti_combatlog = $row['anti_combatlogging_enabled'];
}



echo 0, ("|"), $anti_combatlog, ("|"), $combatlog_timer_usable, ("|"), 1, ("|"), "a", ("|"), "a";






?>