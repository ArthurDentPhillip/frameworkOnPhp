<?php
namespace app\controllers;
use app\models\Main;


class MainController extends AppController {

public function indexAction(){
  
    $this->layout = 'main';
    $this->view = 'index';
}
}