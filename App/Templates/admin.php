<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<?php foreach ($news as $article) : ?>
    <h1><?php echo $article->title; ?></h1>
    <div><?php echo $article->content; ?></div>
    <div><i>Автор статьи: <?php if (null != ($article->author_id)) {
                $article->author = \App\Models\Author::findById($article->author_id);
            }
            echo $article->author->name; ?></i></div>
    <a href="/action.php?edit&id=<?php echo $article->id; ?>" ><div>Редактировать</div></a>
    <a href="/action.php?delete&id=<?php echo $article->id; ?>"><div>Удалить</div></a>
<?php endforeach; ?>

<p>
    <h3><a href="/action.php?add">Добавить новость</a></h3>
</p>

<a href="/index.php">На главную</a>




</body>
</html>