<?php

require __DIR__ . '/autoload.php';

$news = App\Models\Article::findAll();

include __DIR__ . '/App/Templates/admin.php';


//TO DO! Admin panel!