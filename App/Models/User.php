<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    protected static $table = 'passwords';

    public $login;
    public $password;

    public function getModelName()
    {
        return 'Пароли';
    }

}