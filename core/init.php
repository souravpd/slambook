<?php
/* THE INITIAL CONFIGURATION FILE BEING CALLED AT THE TOP OF EACH CLASS */
 session_start();
/* SETTING UP THE ENVIRONMENT VARIABLES  */
 $GLOBALS['config'] = array(
     'mysql' => array(
         'host'=>'127.0.0.1',
         'username'=>'root',
         'password'=>'',
         'db' => 'sac'
     ),
     'remember' => array(
         'cookie_name'=> 'salt',
         'cookie_expiry'=>604800
     ),
     'session' => array(
         'session_name' => 'user'
     )
 );

 /* AUTOLOADING THE CLASSESS */

 spl_autoload_register(function($class){
    require_once('classes/'.$class.'.php');
 });

 require_once("functions/sanitize.php");