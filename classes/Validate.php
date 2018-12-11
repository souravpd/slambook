<?php
    class Validate{
       private $_db;
       private $_passed = false;
       private $_errors = array();

       public function __construct(){
           $this->_db = DB::getInstance();
       }
       public function check($type,$items = array()){
           foreach($items as $item => $rules ){
               foreach($rules as $constraint => $limit){
                   $value = $type[$item];
                   if($constraint == 'required' && $limit == true && empty($value)){
                        $this->addError("{$item} is required");
                   }else{
                       switch ($constraint){
                           case 'min':
                                if(strlen($value)<$limit){
                                    $this->addError("{$item} should be atleast {$limit} characters");
                                }
                           break;
                           case 'max':
                           if(strlen($value)>$limit){
                            $this-> addError("{$item} cannot be more than  {$limit} characters");
                        }
                           break;
                           case 'unique':
                                $this->_db->get("{$limit}",array("{item}","=","{value}"));
                                if($this->_db->count()){
                                    $this->addError("{$value} in {$item}  already exits");
                                }
                           break;
                           case 'matches':
                                if(!($value == $type[$limit])){
                                    $this->addError("{$item} should match with {$limit}");
                                }
                           break;
                       }
                   }
               }
           }
           
           if(empty($this->_errors)){
               $this->_passed=true;
           }
           return $this;
       }

       private function addError($error){
           $this->_errors[] = $error; 
       }

       public function errors(){
           return $this->_errors;
       }
       public function passed(){
           return $this->_passed;
       }
    }

?>