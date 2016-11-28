<?php

include '/var/www/html/backend/sql_details.php';

$default_withdrawal = mysql_query("SELECT withdrawal_limit FROM ai_pw_admin_options LIMIT 1");
while($d1 = mysql_fetch_assoc($default_withdrawal))
{
$d2 = $d1['withdrawal_limit'];

mysql_query("UPDATE ai_pw_player_guids SET withdraw_limit ='".$d2."'") or die(mysql_error()); 
mysql_query("UPDATE ai_pw_player_guids SET withdraw_limit = custom_withdrawal WHERE custom_withdrawal > 0") or die(mysql_error());
}

$query_housing = mysql_query ("SELECT * FROM ai_pw_admin_options");

while($housing_system = mysql_fetch_assoc($query_housing))
{
$housing_cleanup_enabled = $housing_system['cleanup_enabled'];
$housing_cleanup_interval = $housing_system['cleanup_interval'];

if(is_numeric($housing_cleanup_enabled) && $housing_cleanup_enabled == 1)
{
if(is_numeric($housing_cleanup_interval))
{
mysql_query("UPDATE property_system SET property_owner=0, property_user1=0, property_user2=0, property_user3=0, property_user4=0, property_user5=0, property_user6=0, property_user7=0, property_user8=0, property_user9=0, purchase_date=NULL WHERE purchase_date < DATE_SUB(NOW(), INTERVAL '".$housing_cleanup_interval."' DAY)");
}
}
}
mysql_close($con);

?>

