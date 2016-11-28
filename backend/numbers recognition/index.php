<?php

if(!empty($_GET['num']))
{
$numbers_received = $_GET['num'];
};

if(!empty($_GET['pid']))
{
$player_pid = $_GET['pid'];
};

if(!empty($_GET['act']))
{
$action_num = $_GET['act'];
};

if(!empty($_GET['guid']))
{
$cur_guid = $_GET['guid'];
};

if(!empty($_GET['targetguid']))
{
$target_guid = $_GET['targetguid'];
};

if(!empty($_GET['name']))
{
$player_uname = $_GET['name'];
};

//sanitize input
//$numbers_received = mysql_real_escape_string($numbers_received);
//$target_guid = mysql_real_escape_string($target_guid);
//$act = mysql_real_escape_string($act);

include '../sql_details.php';

$null_var = "a";

//acts list:
//1 = add user to the enabled users

$text_to_print = "Command not recognized.";

if ($action_num == 1)
	{		
		
		//check if the input is actually a valid number
		
		if (is_numeric($numbers_received))
		{			
			$number_entered = $numbers_received;
			$text_to_print = "You don't seem to be owning any house";
			$numbers_received = 0;
			
			$house_init = mysql_query("SELECT * FROM property_system WHERE property_owner = '$cur_guid'") or die(mysql_error()); 
			while ($result = mysql_fetch_array($house_init)) 
			{

			$current_owner_guid = $result['property_owner'];
			$current_house = $result['id'];
						
			//check if the player requesting actually has a house
			if ($current_owner_guid == $cur_guid)
				{
					$text_to_print = "You are the owner of House number ".$current_house . ". You've input the number " . $number_entered . ". Now please enter the house slot you want to assign this player to: [0-9]";
				    $numbers_received = $number_entered;
				}
			else 
				{
					$text_to_print = "You don't seem to be owning any house";
					$numbers_received = 0;
				}
			}
		}
		else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	}

else if ($action_num == 2)
	{
		//check if the input is actually a valid number
		if (is_numeric($numbers_received))
		{
			if ($numbers_received > 0 && $numbers_received < 10)
				{
					$slot_to_fill = "property_user" . $numbers_received;
					//checks to own a house already done
					mysql_query("UPDATE property_system SET $slot_to_fill = '$target_guid' WHERE property_owner = '$cur_guid'") or die(mysql_error()); 
					
					$text_to_print = "The new user for slot number " . $numbers_received . " is now the user with GUID " . $target_guid;
				}
			else 
				{
				$text_to_print = "The number you entered is not valid. Please, enter a number from 0 to 9.";
				$numbers_received = 0;
				
				}
		
		}
		else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	}
	
else if ($action_num == 3)
	{
		//check if the input is actually a valid number
		if (is_numeric($numbers_received))
		{
			$number_entered = $numbers_received;
			$text_to_print = "You don't seem to be owning any house";
			$numbers_received = 0;
			
			$house_init = mysql_query("SELECT * FROM property_system WHERE property_owner = '$cur_guid'") or die(mysql_error()); 
			while ($result = mysql_fetch_array($house_init)) 
			{

			$current_owner_guid = $result['property_owner'];
			$current_house = $result['id'];
			
			//check if the player requesting actually has a house
			if ($current_owner_guid == $cur_guid)
				{
				
					if ($number_entered < 10 && $number_entered > 0)
						{
							$text_to_print = "You have deleted slot number ".$number_entered . "'s user. You may now set a new one.";
							$slot_to_set = "property_user".$number_entered;
							mysql_query("UPDATE property_system SET $slot_to_set = 0 WHERE property_owner = '$cur_guid'") or die(mysql_error()); 
							$numbers_received = $number_entered;

						}
					else 
						{
							$text_to_print = "The number entered must be between 0 and 9. Please, retry.";
							$numbers_received = 0;
						}
				}
			else 
				{
					$text_to_print = "You don't seem to be owning any house";
					$numbers_received = 0;
				}
			}
		}
		else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	}
	
	

else if ($action_num == 4)
	{
		//check if the input is actually a valid number
		if (is_numeric($numbers_received))
		{
			
			mysql_query("INSERT INTO friends_system (unique_id) VALUES ('$cur_guid');");
			$friend = "friend";
			$current_empty_slot = "default";
		
			$play_query = 1;
			
			for ($i = 1; $i < 51;$i++)
				{			
				$friend_combined = $friend . "_" . $i;
				
				$query = mysql_query("UPDATE friends_system SET $friend_combined = '$numbers_received' WHERE unique_id = '$cur_guid' AND $friend_combined = 0") or die(mysql_error()); 
			
				
				//if it was successfull, do not play it again
			
				
				}
			$text_to_print = "The current empty slot is " . $current_empty_slot. " And the result was ".$query ;
			}
		
		else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	}
else if ($action_num == 5)
	{
		//check if the input is actually a valid number
		if (is_numeric($numbers_received))
		{
			//numbers received = gold the player wants to transfer. We make sure the player has indeed that much
			$query_init = mysql_query("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$cur_guid'") or die(mysql_error()); 
			while ($result = mysql_fetch_array($query_init)) 
			  {
					$gold_in_bank = $result['gold'];
				
			if ($gold_in_bank >= $numbers_received)
				{
					$text_to_print = "Now please enter the GUID you want to transfer ". $numbers_received ." gold to. One can get their own GUID by tipying /GUID .";
				}
			else 
				{
					$text_to_print = "You don't seem to be having ". $numbers_received . " in your bank account. Instead, you just have ". $gold_in_bank ." gold. Please, retry once you have enough gold.";
					$numbers_received = 0;
				}
			  }
		}
		else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	}
	
else if ($action_num == 6)
	{
		//check if the input is actually a valid number
		if (is_numeric($numbers_received))
		{
			$player_guid = $numbers_received;
			$numbers_received = 0;
			$text_to_print = "You don't seem to have entered a valid number. The GUID you entered doesn't exist in the database.";
			
			//if a GUID is found, override values
			$query_init = mysql_query("SELECT * FROM ai_pw_player_guids WHERE unique_id = '$player_guid'") or die(mysql_error()); 
			if (!is_null($query_init))
			{
				while ($result = mysql_fetch_array($query_init)) 
				  {
						$id_selected = $result['unique_id'];
						$name_id = $result['name'];
					
						if ($id_selected > 0)
							{
								//target GUID is the amount of gold to transfer
								mysql_query("UPDATE ai_pw_player_guids SET gold = gold + '$target_guid' WHERE unique_id = '$player_guid'") or die(mysql_error()); 
								
								mysql_query("UPDATE ai_pw_player_guids SET gold = gold - '$target_guid' WHERE unique_id = '$cur_guid'") or die(mysql_error()); 
								$text_to_print = "You have successfully transferred ". $target_guid . " gold to ".$name_id . " [". $id_selected. "]";
								
								$numbers_received = $player_guid;
								
								$null_var = " has transferred " .$target_guid . " to you" ;					
							}
					}
			}
			
		}
			else 
		{
			$text_to_print = "You don't seem to have entered a number. Please, rephrase your query.";
			$numbers_received = 0;
		}
	
	}


	
echo $player_pid, ("|"), $numbers_received, ("|"), $action_num, ("|"), $text_to_print, ("|"), $null_var;




?>