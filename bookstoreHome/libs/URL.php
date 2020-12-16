<?php

class URL{
    public static function createLink($module, $controller, $action, $params = null){
        if(!empty($params)){
            $linkParams ='';
            foreach ($params as $key => $value) {
               $linkParams .= "&$key=$value";
            }
        }
         $url= sprintf( 'index.php?module=%s&controller=%s&action=%s%s',$module, $controller, $action,  $linkParams);
        return $url;
    }
}
?>