<?php 
namespace app\models;
use site1\core\base\Model;
use Valitron\Validator;
class User extends Model{

        public function load($data){
        foreach($this->attributes as $name=>$value){
        if(isset($data[$name])){
        $this->attributes[$name] = $data[$name]; 
        }
        }
    }

    public function validate($data){
        Validator::langDir(WWW . '/valitron/lang');
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
       if($v->validate()){
       return true;
       }
       
       $this->errors = $v->errors();
       return false;
       
       }
       public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach($error as $item){
                $errors = $errors . '<li>' . $item . '</li>';
                
            }
            
        }
        $errors  = $errors . '</ul>';
        $_SESSION['error'] = $errors;
        
        }

        public function save($table){ 
            $tbl = \R::dispense($table);
            foreach($this->attributes as $name => $value){
            $tbl->$name = $value;
            }
            return \R::store($tbl);
        }

        public function checkUnique(){
        
            $login = \R::getAll("SELECT * FROM `users` WHERE login = ?", array($this->attributes['login']));
            $email = \R::getAll("SELECT * FROM `users` WHERE email = ?", array($this->attributes['email']));
            
            if($login || $email){ 
                if(!empty($login)&&empty($email)){
                    $this->errors['uniqueL'][] = 'Этот логин уже занят';
                }
                else if(empty($login)&&!empty($email)){
                    $this->errors['uniqueE'][] = 'Этот email уже занят';
                }

                else{
                    $this->errors['uniqueL'][] = 'Этот логин уже занят';
                    $this->errors['uniqueE'][] = 'Этот email уже занят';
                }
                return false;
            }
            return true;
            }

            public function login(){
                if(!empty($_POST)){
                    $login = trim($_POST['login']); //если есть пост, он записывается в логин, иначе запписывается null
                    $password = $_POST['password']; //если есть пост, пароль записывается записывается
                }
                
                else{
                    $login = '';
                    $password = '';
                }
                if($login !== '' && $password !== ''){
                   
                   $resL = \R::getAll("SELECT * FROM `users` WHERE login = ?", array($login));//запрос на проверку логина
                    
                    if(!empty($resL)){//если такой логин есть, выгружается пароль из его поля
                        $resP = \R::getAll("SELECT password FROM `users` WHERE login = ?", array($login));
                        $resP = $resP[0]['password'];
                   
                         if(password_verify($password, $resP)){//сравнение пароля из таблицы с паролем из формы
                            \R::exec("INSERT INTO currentLogin (login) VALUES ('$login');"); 
                            $admin = \R::getAll("SELECT login FROM `users` WHERE roles = 'admin';");
                            $admin = $admin[0]['login'];
                            
                            if($admin === $login){
                               \R::exec("INSERT INTO admin (admin) VALUES ('true');");
                            }
                            // if(!empty($admin)){

                            //     \R::exec("INSERT INTO admin (admin) VALUES ('true');"); 
                            // }
                            return true;
                        }
                   
                            return false;
                    }
                    else{
                        
                        return false;
                    }
                   
                }
            }
}