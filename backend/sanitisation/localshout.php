<?php

//Example of a message received: [DanyEle]: Hello World.
$message = $_GET['str'];
$player_id = $_GET['pid'];

//This script filters the messages received, returning a $sanitized_message.
//Better not to show its content: the fewer people know about the exploit, the better.
include 'sanitize_input.php';
//$sanitized_message is the message returned by this script.


//we also output 1 as this is the unique identifier of local chat.
//the sanitized message is output from 'sanitize_input.php'
echo 2 . "|" . $player_id . "|" . $sanitized_message; 

?>