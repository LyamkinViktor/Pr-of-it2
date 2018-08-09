<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Статья</title>
</head>
<body>

<article>
    <h1><?php echo $article->title; ?></h1>
    <div><?php echo $article->content; ?></div>
    <div>Дата публкации: <?php echo $article->date; ?></div>
    <div>Просмотров: <?php echo $article->views; ?></div>
</article>

<div>
    <a href="/index.php">К списку новостей</a>
</div>

</body>
</html>