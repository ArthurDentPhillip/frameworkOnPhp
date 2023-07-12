<?php
namespace vendor\libs;

class Cache
{
    public function __construct()
    {
    }

    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))) {
            return true;
        }
        return false;
    }
    public function get($key)
    {
        if (file_exists(CACHE . '/' . md5($key) . '.txt')) { //если существует этот файл
            $content = unserialize(file_get_contents(CACHE . '/' . md5($key) . '.txt')); //рассериализовать и считать данные из файла
            if (time() <= $content['end_time']) { //если кэш актуален
                return $content['data']; //вернуть его
            }
            unlink(CACHE . '/' . md5($key) . '.txt'); //удалить этот файл
            return false;
        }
    }
    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }
}