<?php 
require_once("core/init.php");

$db = DB::getInstance()->get("users",array("full_name","=","alex"));

    if(!$db->count()){
        echo "No user";
    }else{
        print_r($db->results());
    }
?>