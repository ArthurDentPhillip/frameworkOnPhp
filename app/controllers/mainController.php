<?php
namespace app\controllers;
use app\models\Main;


class MainController extends AppController {

public function indexAction(){
    if(isset($_POST)){
        $data = file_get_contents("php://input");
        $user = json_decode($data, true);
        echo json_encode($user);
        }
    $app = \vendor\core\Registry::instance();
    // $app->getList();
    $model = new Main;
    $data = json_decode(file_get_contents("php://input"), true);
    echo '<pre>';
    echo 'post';
    print_r($data);
    echo '</pre>';
    // $posts = $app->cache->get('product');
    // if(empty($posts)){ 
    //     $posts = \R::findAll('product');
    //     $app->cache->set('product', $posts, 3600*24);
    //     }
   
    // $name = 'Fake';
    // $hi = 'Hello';
    // $array = [
    //     "name" => $name,
    //     "hi" => $hi,
    //     "posts" => $posts,
    // ];
    // $this->set($array);
    $this->layout = 'main';
    $this->view = 'test';
}
}