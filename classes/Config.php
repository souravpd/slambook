<?php
class Config{
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/',$path);
            foreach($path as $small){
                $config = $config[$small];
            }
            return $config;
        }
    }
}