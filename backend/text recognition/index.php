<?php

if(!empty($_GET['text']))
{
$text_received = $_GET['text'];
}
else
{
$text_received = "";
};

if(!empty($_GET['pid']))
{
$player_pid = $_GET['pid'];
};

if(!empty($_GET['guid']))
{
$player_guid = $_GET['guid'];
};

if(!empty($_GET['name']))
{
$player_uname = $_GET['name'];
};


//sanitize input
//$text_received = mysql_real_escape_string($text_received);

include '../sql_details.php';

$event_number = 0;
$text_to_print = "Command not recognized";

if ($text_received == "/help") 
	{
	$text_to_print = "Available commands: /help - /gold - /date - /time - /get_withdraw_limit - /NSA - /house - /add_user_house - /remove_user_house - /GUID - /gg - /scripts - /players_count - /lords - /rules - /score - /played_time";
	$event_number = 1;
	}

else if ($text_received == "/score")
{
	$base_query = ("SELECT * FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) 
	{

		$kills = $result['kills'];
		$tks = $result['teamkills'];
		$deaths = $result['deaths'];
		
	}
	$event_number = 1;
	$score = round ($kills/ $deaths, 3);

	$text_to_print = "Your score is " . $score . ". Teamkills = " . $tks . ". Deaths = " . $deaths . ". Kills = " . $kills;
	
}
else if ($text_received == "/played_time")
{
	$base_query = ("SELECT * FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) 
	{

		$played_time = $result['played_time'];
		
	}
	
	$time_echo = round($played_time / 3600, 3);
	$event_number = 1;
	$text_to_print = "You have played " . $time_echo . " hours on this server so far." ;
	
}
else if($text_received == "/gold")
	{
	$base_query = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) {

	$gold = $result['gold'];
		}
	$event_number = 1;
	$text_to_print = "The amount of gold in your bank account is ". $gold;
	}

else if ($text_received == "/date")
	{
	date_default_timezone_set("Europe/Rome");
	$cet_date = date("Y-m-d", time()); 
	$text_to_print = "The current Central European date is: " . $cet_date;
	$event_number = 1;
	}
else if ($text_received == "/time")
	{
	date_default_timezone_set("Europe/Rome");
	$cet_time = date("H:i:s", time()); 
	$text_to_print = "The current Central European time is: " . $cet_time;
	$event_number = 1;
	}
else if ($text_received == "/scripts")
	{
	$text_to_print = "This server runs DanyEle's PW scriptset. Want to get a server with scripts or PW scripts for your own server? Visit the website http://tinyurl.com/pw-scripts";
	$event_number = 1;
	}
else if ($text_received == "/GUID")
	{
	$base_query = ("SELECT unique_id FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);
	while ($result = mysql_fetch_array($result)) {
	$guid = $result['unique_id'];
		}
	$text_to_print = "Your GUID is " . $guid . ".";
	$event_number = 1;
	}	

else if ($text_received == "/get_withdraw_limit")
	{
	$base_query = ("SELECT withdraw_limit FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) {

	$withdraw_limit = $result['withdraw_limit'];
		}
	$event_number = 1;

	$text_to_print = "Your daily withdraw limit is still " .$withdraw_limit. " gold"; 
	
	}
else if ($text_received == "/NSA")
	{
	$base_query = ("SELECT * FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) {

	$username = $result['name'];
	$unique_id = $result['unique_id'];
	$gold_player = $result['gold'];
	$withdraw_limit = $result['withdraw_limit'];
	$deposit_limit = $result['deposit_limit'];
		}
	$event_number = 1;

	$text_to_print = "Hello" .$name.". NSA here.". "Your GUID is " . $unique_id. ". The gold in your bank account is ".$gold_player. ". Your daily withdraw limit is ".$withdraw_limit." .You can still deposit ".$deposit_limit. " Gold in your bank account"; 
	
	}
	
	else if($text_received == "/rules")
	{
		$event_number = 1;

		
		$base_query = ("SELECT rules FROM ai_pw_admin_options WHERE id = 1") or die(mysql_error()); 
		$result = mysql_query($base_query);
		while ($result = mysql_fetch_array($result)) {
		$rules = $result['rules'];
			}
			
		$text_to_print = "Server rules: ^" . $rules;
	}
	
else if ($text_received == "/house")
	{
	$base_query = ("SELECT * FROM property_system WHERE property_owner = '$player_guid'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) {

	$num_house_owned = $result['id'];
	$expiry_date = $result['purchase_date'];
	$property_price = $result['property_price'];
	$property_user1 = $result['property_user1'];
	$property_user2 = $result['property_user2'];
	$property_user3 = $result['property_user3'];
	$property_user4 = $result['property_user4'];
	$property_user5 = $result['property_user5'];
	$property_user6 = $result['property_user6'];
	$property_user7 = $result['property_user7'];
	$property_user8 = $result['property_user8'];
	$property_user9	= $result['property_user9'];
		}
	$event_number = 1;
	
	if ($num_house_owned > 0) 
		{
		$text_to_print = "You own house number ".$num_house_owned." Your expiry date is ".$expiry_date. ". Its rent is ".$property_price. " Gold.^Those who have access to your house are the following users: Slot 1: ".$property_user1." Slot2: ".$property_user2
		." Slot3: ".$property_user3." Slot4: ".$property_use4." Slot5: ".$property_user5." Slot6: ".$property_user6." Slot7: ".$property_user7." Slot8: ".$property_user8." Slot9: ".$property_user9;
		}
	else 
		{
		$text_to_print = "You do not seem to own any house";
		}
	}
else if ($text_received == "/add_user_house")
	{
	$text_to_print = "Now please enter the user's GUID you want to give access to your house: ";
	$event_number = 2;
	}
else if ($text_received == "/remove_user_house")
	{
	$text_to_print = "Now please enter the house slot you want to clear [1-9]: ";
	$event_number = 3;
	}
	else if ($text_received == "/gg")
	{
	$text_to_print = "Now please enter the amount of gold you want to transfer from your bank account. You can see your bankroll by tipying /gold:";
	$event_number = 5;
	}
	else if ($text_received == "/players_count")
	{
	$text_to_print = "a";
	$event_number = 6;
	}
	else if ($text_received == "/lords")
	{
	$text_to_print = "a";
	$event_number = 7;
	}
	
echo $player_pid, ("|"), $event_number, ("|"), $text_to_print, ("|"), "a";












?>