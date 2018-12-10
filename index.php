<?php 
require_once("core/init.php");

$db = DB::getInstance();
$db = $db->get("users",array("username",array("username","=","alex")));
if($db!=false){
    if($db->count){
        echo "OK";
    }
    else{
        echo " NO";
    }
}
else{
    echo "NOT EXECUTED";
}