<?php

require __DIR__ . '/autoload.php';

$news = App\Models\Article::getLastNews(5);

$view = new \App\View();

//$view->assign('news', $news);

$view->news = $news;
//$view->foo = 1;

$html = $view->render(__DIR__ . '/App/Templates/index.php');

echo $html;

//echo count($view);