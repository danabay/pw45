<?php

require_once('config.php');


if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
	$IP = $_SERVER['HTTP_X_FORWARD_FOR'];
}
else
{
	$IP = $_SERVER['REMOTE_ADDR'];
};

$message_input = $message;
$invalid_characters = array("{}", "{", "}", "<", ">", "<>", "< >");

if(empty($custom_filter))
{
$characters_to_replace = $invalid_characters;
}
else
{
$characters_to_replace = array_merge($invalid_characters, $custom_filter);
};
//replace these evil characters with a space.
$sanitized_message = str_replace($characters_to_replace, "",  $message_input);


switch($log_type) {
	default:
		//Invalid, or disabled.
		break;
	case 1:
		//Enabled, write to file.
		
		$timestamp = date('d/m/Y h:i:s');
		$log_format = "TIMESTAMP: [".$timestamp."]".PHP_EOL.
		"SOURCE SERVER: ".$IP.PHP_EOL.
		"MESSAGE: ".$message.PHP_EOL.
		"SANITISED OUTPUT: ".$sanitized_message.PHP_EOL.
		"-----------------------------------------".PHP_EOL;
		file_put_contents('./'.$log_filename.'_'.date("d_m_Y").'.log', $log_format, FILE_APPEND);
	case 2:
		//Enabled, write to database.
		$con = new mysqli($SQL_HOSTNAME, $SQL_USER, $SQL_PASS, $SQL_DB);
		if ($con->connect_error) {
			trigger_error('DB Connection Error: ' . $con->connect_error, E_USER_ERROR);
		};
		
		$query = 'INSERT INTO sanitise_log (SOURCE_SERVER, MESSAGE, SANITISED_MESSAGE) VALUES (?,?,?)';
		$prep_query = $con->prepare($query);
		$prep_query->bind_param('sss',$IP,$message,$sanitized_message);
		$prep_query->execute();
		$prep_query->close();
};

?>
