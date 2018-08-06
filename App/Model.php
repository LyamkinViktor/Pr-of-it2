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

    public function isNew()
    {
        return null === $this->id;
    }


    public function insert() {
        /*{
        if (!$this->isNew()) {
            return false;
        }*/

        $properties = get_object_vars($this);

        $cols = [];
        $binds = [];
        $data = [];

        foreach ($properties as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            if ('date' == $name) {
                continue;
            }
            if ('views' == $name) {
                continue;
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') 
        VALUES (' . implode(', ', $binds) . ')';

        $db = new Db();

        $this->id = $db->lastInsertId();

        return $db->execute($sql, $data);
    }


    public function update()
    {
        if ($this->isNew()) {
            return false;
        }


        $properties = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($properties as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            if ('date' == $name) {
                continue;
            }
            if ('views' == $name) {
                continue;
            }
            $cols[] = $name . ' = :' . $name;
            $data[':' . $name] = ($value == null ? '' : $value);
        }

        //var_dump($properties);
        //var_dump($cols);
        //var_dump($data);
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $data[':id'] = $this->id;

        $db = new Db();
        return $db->execute($sql, $data);

        //echo $sql;
    }

    public function save()
    {
        $res = $this->isNew() ? $this->insert() : $this->update();
        return $res;
    }

    public function delete()
    {
        if ($this->isNew()) {
            return false;
        }

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        //"DELETE FROM `persons` WHERE `persons`.`id` = 3"
        $data[':id'] = $this->id;

        $db = new Db();
        $res = $db->execute($sql, $data);
        //echo $sql;
        return $res;
    }

}