<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $params=[])
    {
        $sth = $this->dbh->prepare($query);
        $res = $sth->execute($params);
        if (true == $res) {
            return true;
        } else {
            //$arr = $sth->errorInfo();
            //var_dump($arr);
            return false;
        }
    }
}