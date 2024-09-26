<?php
define("DEBUG" , 1);


class ErrorHandler{
    public function __construct(){
        if(DEBUG===1){
            error_reporting(-1);
        }
        if(DEBUG===0){
            error_reporting(0);
        }
        // set_error_handler([$this, 'errorHandler']);
        // ob_start();
	    // register_shutdown_function([$this, 'fatalErrorHandler']);
        // set_exception_handler('exception_handler');
        set_exception_handler([$this, 'exceptionHandler']);
    }

    // public function errorHandler($errno, $errstr, $errfile, $errline){
    //     error_log("[".date('Y-m-d H:i:s') . "] Текст ошибки: {$errstr} Файл: {$errfile} Строка: {$errline}\n++++++++++++\n", 3, __DIR__ .'/errors.log'); 
    //     $this->displayError($errno, $errstr, $errfile, $errline);
    //     return true;
    // }

    // public function fatalErrorHandler(){
    //     $error = error_get_last();
    //     if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE| E_COMPILE_ERROR | E_CORE_ERROR)){
    //         error_log("[".date('Y-m-d H:i:s') . "]" . 'Текст ошибки:' . $error['message'] . 'Файл:' . $error['file'] . 'Строка:' . $error['line'] . '\n++++++++++++\n', 3, __DIR__ .'/errors.log'); 

    //     ob_end_clean();
    //     $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
    //     }
    //     else{
    //     ob_end_flush();
    //     }
    //     }

    public function displayError($errno, $errstr, $errfile, $errline, $responce = 500){
        http_response_code($responce);
        if(DEBUG===1){
            require 'views/dev.php';
        }
        if(DEBUG===0){
            require 'views/prod.php';
        }
        die;
    }
    
public function exceptionHandler(Throwable $exception){
    echo 'ggg';
    error_log("[".date('Y-m-d H:i:s') . "] Текст ошибки: {$exception->getMessage()} Файл: {$exception->getFile()} Строка: {$exception->getLine()}\n++++++++++++\n", 3, __DIR__ .'/errors.log');
    $this->displayError($exception->getMessage(), $exception->getFile(), $exception->getLine(), $exception->getCode());
    }
}
new ErrorHandler();
// echo $test;
throw new Exception("Исключение", 404);
