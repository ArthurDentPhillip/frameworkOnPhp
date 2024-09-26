<?php
namespace app\controllers;
use app\models\Post;

class CartController extends AppController {
    public $postRequest = '';
    public $user;
    public $resultCartUser;

    public $login;
    public function showAction(){
        $this->layout = 'cart';
        $this->view = 'show';

        
        // $app = \vendor\core\Registry::instance();
        $model = new Post;

        $this->login = \R::getAll("SELECT login FROM `currentLogin`;"); 
        $this->login = $this->login[0]['login'];

        $user_tmp = \R::getAll("SELECT id FROM `users` WHERE login LIKE '$this->login';"); 
        $this->user = $user_tmp[0]['id'];
           
        $cartResult = \R::getAll("SELECT products.id, products.name, products.price, products.info, products.image_path
        FROM users_products
        INNER JOIN products ON users_products.products_id = products.id WHERE users_products.users_id = ?", array($this->user));
        
       
        $cart = array_unique($cartResult, SORT_REGULAR);

         \R::getAll("DELETE FROM cache");
         \R::getAll("DELETE FROM productsTmp");

         foreach ($_POST as $key=>$value){
            $tmp = $key;
           
        }

        if(!empty($tmp)){
            \R::getAll("DELETE FROM users_products WHERE products_id = $tmp;");
                    header("Refresh:0");
        }
       

    $array = [
        "cart" => $cart,
    ];
    $this->set($array);

    // }

}
}