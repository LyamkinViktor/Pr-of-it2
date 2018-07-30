<?php

namespace App\Models;

use App\Model;

class Person extends Model
{
    protected static $table = 'persons';

    public $lastname;
    public $age;

    public function getModelName()
    {
        return 'Пользователи';
    }
}