<?php 
$query = $_SERVER['QUERY_STRING'];
use site1\core\Router;

// require '../vendor/core/Router.php';
// require '../site1/libs/functions.php';
// require '../app/controllers/main.php';
// require '../app/controllers/post.php';
require __DIR__ . '/../vendor/autoload.php';

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/site1/core');
define('APP', dirname(__DIR__) . '/app');
define('ROOT', dirname(__DIR__));
define('LAYOUT', 'default');
define('LIBS', dirname(__DIR__) . '/vendor/site1/libs');
define('CACHE', dirname(__DIR__) . '/tmp');
define("DEBUG", 1);

// spl_autoload_register(function($class){
//     $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//     if(is_file($file)){
//         require_once $file;
//     }
// });

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('([a-z-]+)/([a-z-]+)');
Router::dispatch($query);



