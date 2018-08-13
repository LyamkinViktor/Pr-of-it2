<?php
require __DIR__ . '/autoload.php';

$id = (int)$_GET['id'];
$article = \App\Models\Article::findById($id);
$article->author = \App\Models\Author::findById($article->author_id);

include __DIR__ . '/App/Templates/article.php';
