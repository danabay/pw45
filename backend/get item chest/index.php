<?php
$var = $_GET['var'];
$instance_id = $_GET['inst'];

include '../sql_details.php';

$query_inv_slot = mysql_query("SELECT * FROM ai_pw_houses_item_chests WHERE id = '$var'") or die(mysql_error());


while($item_slot_inv = mysql_fetch_assoc($query_inv_slot))
{
$item_slot_201 = $item_slot_inv['item_slot_201'];
$item_slot_202 = $item_slot_inv['item_slot_202'];
$item_slot_203 = $item_slot_inv['item_slot_203'];
$item_slot_204 = $item_slot_inv['item_slot_204'];
$item_slot_205 = $item_slot_inv['item_slot_205'];
$item_slot_206 = $item_slot_inv['item_slot_206'];
$item_slot_207 = $item_slot_inv['item_slot_207'];
$item_slot_208 = $item_slot_inv['item_slot_208'];
$item_slot_209 = $item_slot_inv['item_slot_209'];
$item_slot_210 = $item_slot_inv['item_slot_210'];
$item_slot_211 = $item_slot_inv['item_slot_211'];
$item_slot_212 = $item_slot_inv['item_slot_212'];
$item_slot_213 = $item_slot_inv['item_slot_213'];
$item_slot_214 = $item_slot_inv['item_slot_214'];
$item_slot_215 = $item_slot_inv['item_slot_215'];
$item_slot_216 = $item_slot_inv['item_slot_216'];
$item_slot_217 = $item_slot_inv['item_slot_217'];
$item_slot_218 = $item_slot_inv['item_slot_218'];
$item_slot_219 = $item_slot_inv['item_slot_219'];
$item_slot_220 = $item_slot_inv['item_slot_220'];
$item_slot_221 = $item_slot_inv['item_slot_221'];
$item_slot_222 = $item_slot_inv['item_slot_222'];
$item_slot_223 = $item_slot_inv['item_slot_223'];
$item_slot_224 = $item_slot_inv['item_slot_224'];
$item_slot_225 = $item_slot_inv['item_slot_225'];
$item_slot_226 = $item_slot_inv['item_slot_226'];
$item_slot_227 = $item_slot_inv['item_slot_227'];
$item_slot_228 = $item_slot_inv['item_slot_228'];
$item_slot_229 = $item_slot_inv['item_slot_229'];
$item_slot_230 = $item_slot_inv['item_slot_230'];
$item_slot_231 = $item_slot_inv['item_slot_231'];
$item_slot_232 = $item_slot_inv['item_slot_232'];


}

echo  $var, ("|"), $instance_id, ("|"), $item_slot_201, ("|"), $item_slot_202, ("|"), $item_slot_203, ("|"),$item_slot_204, ("|"), $item_slot_205, ("|"), $item_slot_206, ("|"),$item_slot_207, ("|"), 
$item_slot_208, ("|"), $item_slot_209, ("|"),$item_slot_210, ("|"), $item_slot_211, ("|"), $item_slot_212, ("|"),$item_slot_213, ("|"), $item_slot_214, ("|"), 
$item_slot_215, ("|"),$item_slot_216, ("|"), $item_slot_217, ("|"), $item_slot_218, ("|"),$item_slot_219, ("|"), $item_slot_220, ("|"), $item_slot_221, ("|"),
$item_slot_222, ("|"), $item_slot_223, ("|"), $item_slot_224, ("|"),$item_slot_224, ("|"), $item_slot_225, ("|"), $item_slot_226, ("|"),$item_slot_227, ("|"),
 $item_slot_228, ("|"), $item_slot_229, ("|"),$item_slot_230, ("|"), $item_slot_231, ("|"), $item_slot_232 ;






?>