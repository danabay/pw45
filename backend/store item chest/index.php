<?php
$var = $_GET['var'];
$prop_slot = $_GET['slot'];
$item_id = $_GET['item'];

include '../sql_details.php';

// $item_slot = "item_slot_" + "$prop_slot";

$prop_slot = $prop_slot + 1;

$prop_slot_string = (string) $prop_slot;

//merge the strings
$prop_slot_usable = "item_slot_" . $prop_slot_string; 

//set the content of the chest
mysql_query("UPDATE ai_pw_houses_item_chests SET $prop_slot_usable = '$item_id' WHERE id = '$var';") or die(mysql_error()); 


?>