<?php
namespace app\controllers;
use app\models\User;
class UserController extends AppController {

    public function signupAction(){
        $this->layout = 'user';
        $this->view = 'signup';
        session_start(); 
        unset($_SESSION['reg']);

        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if($user->validate($data) && $user->checkUnique()){
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_BCRYPT);
                $user->save('users');
                // $success = 'Вы успешно зарегестрировались';
                // $array = [
                //     'success' => $success,
                //     ];
                //     $this->set($array);
                    $new_url = 'http://site1.local/user/login';
                    header('Location: '.$new_url);

            }
    
            else{
                $user->getErrors();
                if(isset($_SESSION['error'])){
                    $errors = $_SESSION['error'];
                    $array = [
                    'errors' => $errors,
                    ];
                    $this->set($array);
                }
            }
        }
        

    }
    public function loginAction(){
        
        $user = new User();
        \R::getAll("DELETE FROM admin");
        session_start();
        unset($_SESSION['reg']);
        unset($_SESSION['admin']);
        
        \R::getAll("DELETE FROM currentLogin");
        $this->layout = 'user';
        $this->view = 'login';
        if(!empty($_POST)){
            if($user->login()){
               
                    
                    $_SESSION['reg'] = 'Вы успешно вошли';

                    $admin =  \R::getAll("SELECT * FROM `admin`"); 
                    if(!empty($admin)){
                        echo 'yes';
                        $_SESSION['admin'] = 'Admin';
                        // var_dump($_SESSION['admin']);
                    }
                    $new_url = 'http://site1.local/post/goods';
                    header('Location: '.$new_url);
            }
            else{
                
                $errors = 'Логин и пароль не верные';
                    $array = [
                    'errors' => $errors,
                    ];
                    $this->set($array);
            }
        }
        else{
            echo 'ccc';
                $user->login();
        }
        }
        

    // public function logoutAction(){
    // }
    }

//     public function showAction(){
//         $model = new Post;

        

//     // $array = [
//     //     "cart" => $cart,
//     // ];
//     // $this->set($array);



// }
