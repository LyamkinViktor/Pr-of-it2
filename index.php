<?php

require __DIR__ . '/autoload.php';

$news = App\Models\Article::getLastNews(5);

include __DIR__ . '/templates/index.php';
