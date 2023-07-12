<?php
namespace vendor\core;

class Db
{ //в нем создает шаблон singleton который не дает создать больше чем один объект
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        // $db = require ROOT . '/config/config_db.php'; //ПОДКЛЮЧЕНИЕ МАССИВА С ДАННЫМИ
        // $options = [
        //     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        //     \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        // ];
        // $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
    }

    public static function instance()
    {
        if (self::$instance === NULL) {
            self::$instance = new self; //СОЗДАЕТСЯ ОБЪЕКТ ЭТОГО КЛАССА
        }
        return self::$instance;
    }

    // public function execute($sql)
    // {
    //     $stmt = $this->pdo->prepare($sql); //ДЛЯ ОБНОВЛЕНИЯ И ДОБАВЛЕНИЯ ДАННЫХ
    //     return $stmt->execute();
    // }

    // public function query($sql, $params = [])
    // { //ДЛЯ ВОЗВРАЩЕНИЯ ДАННЫХ
    //     self::$countSql++;
    //     self::$queries[] = $sql;
    //     $stmt = $this->pdo->prepare($sql);
    //     $res = $stmt->execute($params);
    //     if ($res !== false) {
    //         return $stmt->fetchAll(); //ДАННЫЕ
    //     }
    //     return []; //ПУСТОЙ МАССИВ
    // }
}