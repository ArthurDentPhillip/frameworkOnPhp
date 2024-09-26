<?php
namespace app\controllers;
use app\models\Post;

class PostController extends AppController {
    public $postRequest = '';
    public $resultCartUser;

    public $user;

    public $login;

    public function goodsAction(){
        $this->layout = 'post';
        $this->view = 'goods';
        
          
        // echo $tmp;
        // $app = \vendor\core\Registry::instance();//СОЗДАЕТСЯ ЭКЗЕМПЛЯР КЛАССА REGISTRY
        $model = new Post;//МОДЕЛЬ ДЛЯ ТОГО, ЧТОБЫ РАБОТАЛ REDBEAN

         $this->login = \R::getAll("SELECT login FROM `currentLogin`;"); 
         $this->login = $this->login[0]['login'];

        $user_tmp = \R::getAll("SELECT id FROM `users` WHERE login LIKE '$this->login';"); 

        $this->user = $user_tmp[0]['id'];
      
        foreach ($_POST as $key=>$value){
            $tmp = $key;           
        }
       
        if(!empty($tmp) && $tmp!== 'products'){
            \R::getAll("INSERT INTO users_products (products_id, users_id) VALUES ('$tmp', '$this->user');"); 
        }


//======================================================================
//                      БЛОК ДЛЯ СЕЛЕКТА
//======================================================================
                        $cacheNum = \R::getAll('SELECT num FROM cache');
                        $productsValue = \R::getAll('SELECT value FROM productsTmp');

                        if(empty($cacheNum)){
                            $posts = \R::findAll('products');
                            \R::exec("INSERT INTO cache (num) VALUES ('1');"); 
                        }
                       
                        else{
                            $tmp = \R::getAll('SELECT value FROM productsTmp');
                            if(!empty($_POST["products"])){
                                \R::getAll("DELETE FROM productsTmp;");
                                $this->postRequest = $_POST["products"];
                                \R::exec("INSERT INTO productsTmp (value) VALUES ('$this->postRequest');"); 
                                $productsValue = \R::getAll('SELECT value FROM productsTmp');
                                $posts = \R::getAll("SELECT products.id, products.name, products.price, products.info, products.image_path
                                FROM products
                                INNER JOIN selProducts ON products.sel_id = selProducts.product_id WHERE selProducts.product_type = ?", array($productsValue[0]['value']));
                           
                        }

                        else if(empty($tmp)&&empty($_POST["products"])){
                            $posts = \R::findAll('products');
                        }
                        else
                           {
                                $productsValue = \R::getAll('SELECT value FROM productsTmp');
                                $posts = \R::getAll("SELECT products.id, products.name, products.price, products.info, products.image_path
                                FROM products
                                INNER JOIN selProducts ON products.sel_id = selProducts.product_id WHERE selProducts.product_type = ?", array($productsValue[0]['value']));
                            }

                        }
                     

//======================================================================
//                ПЕРЕНАПРАВЛЕНИЕ ПРИ КЛИКЕ НА КАРТИНКУ
//======================================================================       
if(isset($_GET['id'])){
    $id = $_GET['id'];
    \R::exec("INSERT INTO idDetails (num) VALUES ('$id');"); 
    $new_url = 'http://site1.local/detailed/show';
    header('Location: '.$new_url);
    
} 

    $array = [
        "posts" => $posts,//ЗАПИСЬ РЕЗУЛЬТАТА ЗАПРОСА В МАССИВ
    ];
    $this->set($array);//ПЕРЕДАЧА ВО VIEW

    }
  
}

