<?php
namespace app\controllers;
use app\models\Post;

class AdminController extends AppController {
    public $array = [];
    public $oneImg;
    public $twoImg;
    public $threeImg;

    public $id_product;
    public function showAction(){
        $this->layout = 'admin';
        $this->view = 'show';

        
        // $app = \vendor\core\Registry::instance();
        $model = new Post;

        $cart = \R::getAll("SELECT id, name FROM products"); 
    
        if(!empty($_POST['name'])){
            if(is_uploaded_file($_FILES['file-1']['tmp_name'])) {
                move_uploaded_file($_FILES['file-1']['tmp_name'], ROOT . '/public/images/'.$_FILES['file-1']['name']);
            }
            $url = '/images/'.$_FILES['file-1']['name'];
        $name = $_POST['name'];
        $cat = $_POST['category'];
        $price = $_POST['price'];
        $info = $_POST['info'];

        \R::exec("INSERT INTO products (name, category_id, price, info, image_path, sel_id, pr_id) VALUES ('$name', '$cat', '$price', '$info', '$url', '1', '2');"); 
        }
        // elseif(!empty($_GET)){
        //     $this->id_product = $_GET['products'];
        // }
        if(!empty($_POST['products']) && !empty($_FILES['fileImage']['tmp_name'])){
            $this->id_product = $_POST['products'];
            $length1 = count($_FILES['fileImage']['tmp_name']);
           
            for ($x = 0; $x<$length1; $x++){
                for($y=$x; $y<=$x; $y++){
                    if(is_uploaded_file($_FILES['fileImage']['tmp_name'][$x])) {
                        move_uploaded_file($_FILES['fileImage']['tmp_name'][$x], ROOT . '/public/images/img/'.$_FILES['fileImage']['name'][$y]);
                    }
                    
                    $fileName = '/images/img/'.$_FILES['fileImage']['name'][$y];
                    
                    array_push($this->array, "$fileName");
                    
                }
            }
            // echo '<pre>';
            //         print_r($this->array);
            //         echo '</pre>';
            $this->oneImg = $this->array[0];
            $this->twoImg = $this->array[1];
            $this->threeImg = $this->array[2];
            
                \R::exec("INSERT INTO img (i1, i2, i3, id_product) VALUES ('$this->oneImg','$this->twoImg','$this->threeImg', '$this->id_product');");
        }

        
        
    $array = [
        "cart" => $cart,
    ];
    $this->set($array);


}
}