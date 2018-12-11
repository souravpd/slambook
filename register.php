<?php
require_once('core/init.php');
if(Input::exits('post')){
    $validate = new Validate();
       $result =  $validate->check($_POST,
        array(
            "username"=>array("required"=>true,"min"=>3,"max"=>3,"unique"=>"users"),
            "password"=>array("required"=>true,"min"=>6),
            "passwordAgain"=>array("required"=>true,"matches"=>"password")));
}

if($result->passed()){
    echo "pased";

}else{
   $errors = $result->errors();
   foreach ($errors as $error){
       echo " {$error} <br>";
   }
}

?>
<form action="" method="post">
<input type="text"  name = "username" id="username" placeholder="username">
<input type="password"  name = "password" id="password" placeholder="password">
<input type="password"  name = "passwordAgain" id="password" placeholder="passwordAgain">
<input type="submit" value="register">
</form>