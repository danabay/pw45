<?php



//Logging Configuration
$log_type="0"; // 0 = Disabled. 1 = Enabled, write to file. 2 = Enabled, write to MySQL Database.
$log_filename="queries"; //Filename will be basename_datestamp.log


//MySQL Configuration
$SQL_HOSTNAME="localhost"; //This is the hostname of your MySQL server. 
$SQL_PORT="3306"; //Default is 3306. Leave this unless you know what you are doing.
$SQL_DB=""; // Database name.
$SQL_USER=""; // MySQL Username.
$SQL_PASS=""; // MySQL Password.

//The below filter can be used to remove words/phrases from your server's chat. Do not uncomment the below line without adding something to it, else it can have unintended consequences.
//$custom_filter = array("", "");

?>
