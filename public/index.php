<?php 
$query = $_SERVER['QUERY_STRING'];
use vendor\core\Router;

// require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
// require '../app/controllers/main.php';
// require '../app/controllers/post.php';

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('APP', dirname(__DIR__) . '/app');
define('ROOT', dirname(__DIR__));
define('LAYOUT', 'default');
define('LIBS', dirname(__DIR__) . '/vendor/libs');
define('CACHE', dirname(__DIR__) . '/tmp');

spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('([a-z-]+)/([a-z-]+)');
Router::dispatch($query);
