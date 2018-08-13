<?php

namespace App\Models;


use App\Model;
use App\Db;
use App\Models\Author;

class Article extends Model
{
    protected static $table = 'news';

    public $title;
    public $content;
    public $author_id;
    public $author;


    public function getModelName()
    {
        return 'Новость';
    }

    public static function getLastNews($number)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY date DESC LIMIT :n';
        $params = [':n' => $number];
        $news = $db->query($sql, self::class, $params);
        return $news;
    }

}