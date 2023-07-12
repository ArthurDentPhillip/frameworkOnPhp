<?php
require 'rb.php'; 
$dv = require '../config/config_db.php';
R::setup( 'mysql:host=localhost;dbname=class', 'root', '' ); 
R::freeze(true); //заморозка структуры таблицы, чтобы редбин ее не изменял типы полей в зависимости от значений
R::fancyDebug(TRUE);
$isConnected = R::testConnection();
echo $isConnected;
//СОЗДАНИЕ ТАБЛИЦЫ
$cat = R::dispense('category'); //создание таблицы категория
$cat->title = 'Категория 1'; //заполнение таблицы (title - название поля, Категория 1 - его содержимое)
$id = R::store($cat); //сохраннеие записи в таблице
//ЧТЕНИЕ ДАННЫХ
$cat = R::load('category', 2); //имя таблицы и номер записи
var_dump($cat);
//UPDATE
$cat2 = R::load('category', 3);
echo $cat2->title . '<br>';
$cat2->title = 'Категория 3';
R::store($cat2);
echo $cat2->title;
//УДАЛЕНИЕ
$cat3 = R::load('category', 3);
R::trash($cat3);
//УДАЛЕНИЕ ВСЕЙ ТАБЛИЦЫ
R::wipe('category');
//FINDALL И FINDONE
// $cats = R::findAll('product'); //получение всех записей
// echo '<pre>';
// print_r($cats);
// echo '</pre>';

$cats3 = R::findAll('product', 'id < ?', [20]); //все записи, где id больше 18
// echo '<pre>';
// print_r($cats3);
// echo '</pre>';
$cats6 = R::findOne('product', 'id = 18');
echo '<pre>';
print_r($cats6);
echo '</pre>';