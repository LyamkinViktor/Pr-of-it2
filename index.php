<?php

require __DIR__ . '/autoload.php';

$news = App\Models\Article::getLastNews(3);

include __DIR__ . '/templates/index.php';