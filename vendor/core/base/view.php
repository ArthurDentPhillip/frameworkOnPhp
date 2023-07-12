<?php
namespace vendor\core\base;

Class View {
public $route = [];
public $view;
public $layout;

public function __construct($route, $layout = '', $view = ''){
    $this->route = $route;
    if($layout === false){
        $this->$layout = false;
    }
    else{
        $this->layout = $layout ?: LAYOUT;
    }
    $this->view = $view;
}

public function render($var){
    extract($var);
    $controller_string = (string) $this->route['controller'];
    $file_view = APP . "/views/$controller_string/$this->view.php";
    var_dump($file_view);
    ob_start();
    if(is_file($file_view)){
        require $file_view;
    }
    else{
        echo "<p>Не найден вид <b>{$file_view}</b></p>";
    }
    $content = ob_get_clean();

    if(isset($this->layout)){
        $file_layout = APP . "/views/layouts/$this->layout.php"; 
   
    if(is_file($file_layout)){
        require $file_layout;
    }
    else{
        echo "<p>Не найден шаблон <b>{$file_layout}</b></p>";
    }
    }
    
}
}