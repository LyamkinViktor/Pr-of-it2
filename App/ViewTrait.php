<?php

namespace App;


trait ViewTrait
{
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return isset ($this->data[$name]) ? $this->data[$name] : null ;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

}