<?php

namespace App\Models;


use App\Model;
use App\Db;

class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $content;
    public $date;
    public $views;

    public function getModelName()
    {
        return 'Новость';
    }

    public static function getLastNews($number)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY date DESC LIMIT ' . $number;
        $news = $db->query($sql, self::class);
        return $news;
    }

}