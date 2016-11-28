<?php
$gold_deposited = $_GET['gold'];
$player_uid = $_GET['id'];
$player_pid = $_GET['pid'];
include '../sql_details.php';

	$gold_in_bank_initial = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
	$result_gold_initia = mysql_query($gold_in_bank_initial);

	while ($row = mysql_fetch_array($result_gold_initia)) {

	$gold_in_bank_before_deposit = $row['gold'];

	}

	$deposit_count = ("SELECT deposit_limit FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
	$deposit_result = mysql_query($deposit_count);

	while ($row = mysql_fetch_array($deposit_result)) {

	$deposit_limit_usable = $row['deposit_limit'];

	}
	
	 if ($gold_deposited < 5000) 
	{
	$gold_in_bank_after_deposit = $gold_in_bank_before_deposit + $gold_deposited;

	//if invalid: you've gone over the withdraw limit
	 if  ($gold_in_bank_after_deposit > $deposit_limit_usable)
		{
			echo $deposit_limit_usable, ("|"), $player_pid, ("|"), "a" ;
		}
	//if valid
	 else
		{
		mysql_query("UPDATE ai_pw_player_guids SET gold = gold + '$gold_deposited' WHERE unique_id = '$player_uid';") or die(mysql_error()); 

		$gold_in_bank_final = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
		$result_gold = mysql_query($gold_in_bank_final);

		while ($row = mysql_fetch_array($result_gold)) {

		$gold_in_bank_after_deposit = $row['gold'];

			}
		echo $player_uid, ("|"), $gold_in_bank_after_deposit,("|"), $player_pid,("|"), $gold_deposited, ("|"), $deposit_limit_usable, ("|"), 0 ;
		}
	}
	else if ($gold_deposited == 5000)
	{
	//gold after depositing. (i.e: 100.000 + 5.000)
	$gold_in_bank_after_deposit = $gold_in_bank_before_deposit + $gold_deposited;

	//if valid
	 if ($gold_in_bank_after_deposit > $deposit_limit_usable)
		 {
		
				echo $deposit_limit_usable, ("|"), $player_pid, ("|"), "a" ;
				//echo $deposit_limit_usable, ("|"), $player_pid;
		
		}
	//if invalid: you've gone over the deposit limit
	else if ($gold_in_bank_after_deposit <= $deposit_limit_usable) 
		{
		mysql_query("UPDATE ai_pw_player_guids SET gold = gold + '$gold_deposited' WHERE unique_id = '$player_uid';") or die(mysql_error()); 

		$gold_in_bank_final = ("SELECT gold FROM ai_pw_player_guids WHERE unique_id = '$player_uid'") or die(mysql_error()); 
		$result_gold = mysql_query($gold_in_bank_final);

		while ($row = mysql_fetch_array($result_gold)) {

		$gold_in_bank_after_deposit = $row['gold'];

			}
		echo $player_uid, ("|"), $gold_in_bank_after_deposit,("|"), $player_pid,("|"), $gold_deposited, ("|"), $deposit_limit_usable ;
		
		}
	
	
	
	}


?>