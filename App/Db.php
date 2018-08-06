<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::getInstance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';
        dbname=' . $config->data['db']['dbName'], $config->data['db']['user'], $config->data['db']['pwd']);
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

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}