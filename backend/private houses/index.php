<?php
	$player_uid = $_GET['id'];
	$player_pid = $_GET['pid'];
	$prop_var = $_GET['var2'];
	$instance_id = $_GET['inst'];

	include '../sql_details.php';

	$house_permission = 0;

	//check the var first
	if(is_numeric($prop_var) && $prop_var > "0" ) {
	$house_init = mysql_query("SELECT * FROM property_system WHERE id ='".$prop_var."'") or die(mysql_error()); 

	while ($result = mysql_fetch_array($house_init)) {

	$house_usable = $result['property_owner'];
	$house_user1 = $result['property_user1'];
	$house_user2 = $result['property_user2'];
	$house_user3 = $result['property_user3'];
	$house_user4 = $result['property_user4'];
	$house_user5 = $result['property_user5'];
	$house_user6 = $result['property_user6'];
	$house_user7 = $result['property_user7'];
	$house_user8 = $result['property_user8'];
	$house_user9 = $result['property_user9'];
	//check GUID for owner boss
	if ($player_uid == $house_usable) {
	$house_permission = 1; 
				}
	
	//check GUID for other users
	else if ($player_uid == $house_user1 || $player_uid == $house_user2 ||$player_uid == $house_user3 ||$player_uid == $house_user4 ||$player_uid == $house_user5
	||$player_uid == $house_user6 ||$player_uid == $house_user7 ||$player_uid == $house_user8 || $player_uid == $house_user9)   {
	$house_permission = 1;
			}
	
		}
	}

	if ($house_permission != 0) {
	//permission granted
	$house_permission = $prop_var;
	echo $player_pid, ("|"), $player_uid, ("|"), $house_permission, ("|"), $prop_var, ("|"), $instance_id, ("|"), "a";
	}
	else {
	//no permission
	echo $player_pid, ("|"), 0, ("|"), 0, ("|"), "a";

	}


?>
