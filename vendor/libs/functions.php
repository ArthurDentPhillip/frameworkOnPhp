<?php 
namespace vendor\libs;
class Debugger {
    public static function debug($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

}
?>