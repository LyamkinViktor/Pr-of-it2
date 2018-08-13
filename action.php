<?php
require __DIR__ . '/autoload.php';

use \App\Models\Article;

if (isset($_POST['delete'])) {

    $article = new Article();

    $id = (int)$_POST['delete'];

    $article->id = $id;

    $article->delete();

    header('Location: /admin.php');
}

if (isset($_POST['add'])) {
    $article = new Article();

    $article->title = $_POST['header'];
    $article->content = $_POST['text'];

    $article->insert();

    header('Location: /admin.php');
}

if (isset($_POST['edit'])) {
    $article = new Article();

    $id = $_POST['edit'];
    $article->id = $id;
    $article->title = $_POST['header'];
    $article->content = $_POST['text'];

    $article->update();

    header('Location: /admin.php');

}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $article = Article::findById($id);
} else {
    $id = null;
    $article = null;
}

include __DIR__ . '/App/Templates/form.php';

