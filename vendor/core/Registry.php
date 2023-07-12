<?php

namespace vendor\core;

class Registry{
    public static $objects = [];
    protected static $instance;
    protected function __construct(){
    // global $config;
    require_once ROOT . '/config/config.php'; //ВМЕСТО КОНФИГА УКАЗАТЬ ПУТЬ К ЭТОМУ ФАЙЛУ
    foreach($config['components'] as $name=> $component){
        // var_dump($name);
        // echo '<br>';
        // var_dump($component);
        // echo '<br>';
    
        self::$objects[$name] = new $component; //создается объект указанного класса
    }
    }
    
        public static function instance()
        {
            if (self::$instance === NULL) {
                self::$instance = new self; //Для синглтона
            }
            return self::$instance;
        }
    
    public function getList(){
    echo '<pre>';
    echo 'Get list <br>';
    var_dump(self::$objects);
    echo '</pre>';
    }
    
    public function __get($name){
        if(is_object(self::$objects[$name])){
        return self::$objects[$name];
        }
        }
    
        public function __set($name, $value){
            if(!isset(self::$objects[$name])){ 
            self::$objects[$name] = new $value;
            }
        }
    }

    // $app = Registry::instance();
    // var_dump($app->getList());