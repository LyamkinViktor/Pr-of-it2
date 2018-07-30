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

<?php foreach ($news as $article) { ?>
    <h1><?php echo $article->title; ?></h1>
    <div><?php echo $article->content; ?></div>
    <a href="/article.php?id=<?php echo $article->id; ?>"><div>Читать</div></a>
    <div>Дата публикации: <?php echo $article->date; ?></div>
    <div>Просмотров: <?php echo $article->views; ?></div>
<?php } ?>

</body>
</html>