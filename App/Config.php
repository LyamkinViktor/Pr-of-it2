<?php

namespace App;

class Config
{
    protected static $instance;
    public $data = [];

    protected function __construct()
    {
        $this->data = require __DIR__ . '/DbConfig.php';
    }

    public static function getInstance()
    {
        if (null == self::$instance) {
            return self::$instance = new self;
        }

        return self::$instance;

    }

}