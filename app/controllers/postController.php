<?php
namespace app\controllers;
use app\models\Post;

class PostController extends AppController {
      public function goodsAction(){
//         $text = $_POST['data'];
// echo '<span>'.$text.'</span>';
        $this->layout = 'post';
        $this->view = 'goods';
        $app = \vendor\core\Registry::instance();
    // $app->getList();
    $model = new Post;

    $posts = $app->cache->get('products');
    if(empty($posts)){ 
        $posts = \R::findAll('products');
        $app->cache->set('products', $posts, 3600*24);
        }
    $array = [
        "posts" => $posts,
    ];
    $this->set($array);

    }
    public function addAction(){
        $this->layout = 'post';
        $this->view = 'add';
        // var_dump($_POST);
    }
}