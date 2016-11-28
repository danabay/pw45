<?php
	$player_uid = $_GET['id'];
	$player_pid = $_GET['pid'];
	$prop_var = $_GET['var2'];
	$player_gold = $_GET['gold'];

	include '../sql_details.php';
	
	if(is_numeric($prop_var) && $prop_var > 0) {
	
    //select house cost
	$base_query = ("SELECT * FROM property_system  WHERE id ='".$prop_var."'") or die(mysql_error()); 
	$result = mysql_query($base_query);

	while ($result = mysql_fetch_array($result)) 
	{

	$price = $result['property_price'];
	$property_owner = $result['property_owner'];

	}

	//if the house is unowned
	if ($property_owner == "0") 
	{
	//check if player has enough money to buy house
	if ($player_gold >= $price )
		//if he does, check if he doesn't own any other house
		{
		
		$base_query = ("SELECT * FROM property_system WHERE property_owner = '$player_uid'") or die(mysql_error()); 
		$result = mysql_query($base_query);

		while ($result = mysql_fetch_array($result)) 
		{
		$property_owner = $result['property_owner'];
		$property_id = $result['id'];
		}
		
		//if he doesn't already own any house, buy it: remove money from player and fill the DB option with players' GUID
		if ($property_owner != 0)
			{
			$event_number = 1; 
			//$text_to_print = "You already own house number " . $property_id . ". Therefore, you cannot buy any other houses.";
			echo $player_pid, ("|"), "a", ("|"), "a";

			//echo $player_pid, ("|"), $event_number, ("|"), $text_to_print, ("|"), "a";
			}
		else if ($property_owner == 0)
			{
			mysql_query("UPDATE property_system SET property_owner = '$player_uid', purchase_date=current_timestamp WHERE id ='".$prop_var."'") or die(mysql_error()); 
			$gold_new_player = $player_gold - $price;
			//communicate it to the player
			echo $player_pid, ("|"), $gold_new_player, ("|"), $prop_var, ("|"), $price, ("|"), $player_uid , ("|"), 0 ,("|"), "a";
			}
		}
	else 
		//not enough gold
		{
		echo $player_pid, ("|"), $price, ("|"), $player_gold, ("|"), 0, ("|"), "a";
		
		}
		
	}
	//someone has already bought it
	else 
	{
	echo $player_pid, ("|"), "a", ("|"), "a";
	
	}
	

}

?>
