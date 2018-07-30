<?php

namespace App;


abstract class Model
{

    protected static $table = null;

    public $id;


    abstract public function getModelName();


    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql, static::class);
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = [':id' => $id];
        $record = $db->query($sql, static::class, $params);
        return $record[0] ?? false;
    }

}