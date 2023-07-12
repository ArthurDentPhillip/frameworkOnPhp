<?php
// require '../app/controllers/main.php';
// require '../app/controllers/post.php';
namespace vendor\core;
class Router {
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url){
        foreach(self::$routes as $key=>$value){
            if(preg_match("#$key#", $url, $matches)){
                if($key === '([a-z-]+)/([a-z-]+)'){
                    $string = explode("/", $url);
                    // self::$route['controller'] = $string[0];
                    // self::$route['action'] = $string[1];
                    if($string[0] === 'page'){
                        if(isset($string[2])){
                            self::$route['alias'] = $string[2];
                        }
                        self::$route['controller'] = 'Page';
                        self::$route['action'] = 'view';
                    }
                    else{
                        self::$route['controller'] = $string[0];
                        self::$route['action'] = $string[1];
                    }
                    return 1;
                }
                else{
                    foreach($value as $k => $v){
                        self::$route[$k] = $v;
                    }
                    return 2;
                    
                }
            }

        }
        return 3;
    }
public static function dispatch($url){
    $url = self::removeQueryString($url);
    $mRout = self::matchRoute($url);
    if($mRout===1 || $mRout===2){
        $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
        // echo self::$route['controller'] . '<br>';
        if(class_exists($controller)){
        $obj = new $controller(self::$route);
        // var_dump(self::$route);
        // $action = self::$route['action'];
        $action = self::$route['action'] . 'Action';
        // var_dump($action);
        
            if(method_exists($obj, $action)){
                $obj->$action();
                $obj->getView();
            }
            else{
                echo "Метод <b>$controller::$action</b> не найден";
            }
        }
        else{
            echo "Контроллер <b>$controller</b> не найден!";
        }
    }
    else{
        http_response_code(404);
        include '404.html';
    }
}


protected static function upperCamelCase($name){
    $name = ucwords($name);
    $name = str_replace('-', ' ', $name);
    $name = str_replace(' ', '', $name);
    // Debugger::debug($name);
    return $name;
    }
    
protected static function lowerCamelCase($name){
    return lcfirst(self::upperCamelCase($name));
    }

protected static function removeQueryString($url){
    if($url){
        $params = explode('&', $url, 2);
        // echo '<pre>';
        // print_r($params);
        // echo '</pre>';
        if(false===strpos($params[0], '=')){
            return rtrim($params[0], '/');
        }
        else{
            return '';
        }
    }
    // echo '<pre>';
    // print_r($url);
    // echo '</pre>';
    return $url;
    }
        
}