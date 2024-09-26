<?php
namespace app\controllers;
use app\models\Post;

class DetailedController extends AppController {
   
    public function showAction(){
        $this->layout = 'detailed';
        $this->view = 'show';

        
        // $app = \vendor\core\Registry::instance();
        $model = new Post;

        $id = \R::getAll("SELECT num FROM `idDetails` GROUP BY num;"); 
        $id = intval($id[0]['num']);

        $cart = \R::getAll("SELECT img.i1, img.i2, img.i3, products.id, products.name, products.price, products.info, products.image_path FROM products INNER JOIN img ON products.id = img.id_product WHERE products.id = $id"); 

       
        \R::getAll("DELETE FROM idDetails;");

    $array = [
        "cart" => $cart,
    ];
    $this->set($array);

}
}