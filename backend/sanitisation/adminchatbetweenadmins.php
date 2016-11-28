<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

ini_set('allow_url_include', 1);
error_reporting(E_ALL);*/


//Example of a message received: [DanyEle]: Hello World.
$message = $_GET['str'];
$player_id = $_GET['pid'];
$target_player_id = $_GET['targetpid'];

//This script filters the messages received, returning a $sanitized_message.
//Better not to show its content: the fewer people know about the exploit, the better.
include 'sanitize_input.php';
//$sanitized_message is the message returned by this script.


//we also output 1 as this is the unique identifier of local chat.
//the sanitized message is output from 'sanitize_input.php'
echo 7 . "|" . $player_id . "|" .  $target_player_id .  "|". $sanitized_message; 

?>