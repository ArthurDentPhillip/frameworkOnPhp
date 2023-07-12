<?php
namespace vendor\core\base;
use vendor\core\base\View;

abstract class Controller {
    public $route = [];
    public $view;
    public $layout;
    public $var = [];
    public function __construct($route){
        $this->route=$route;
    }

    public function getView (){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->var);
    }

    public function set($var){
        $this->var = $var;
    }
}