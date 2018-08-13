<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>

         <form action="/action.php" method="post">
            <p><input style="width: 500px;" type="text" name="header" value="<?php if (null != $id) : echo $article->title; endif; ?>"></p>
            <p><textarea style="height: 200px; width: 500px" name="text"><?php if (null != $id) : echo $article->content; endif; ?></textarea></p>
            <?php if (isset ($_GET['edit'])) : ?> <p><button name="edit" value ="<?php echo $id; ?>"> Сохранить </button></p> <?php endif; ?>
            <?php if (isset ($_GET['add'])) : ?> <p><button name="add"> Добавить новость </button></p> <?php endif; ?>
            <?php if (isset ($_GET['delete'])) : ?> <p><button name="delete" value ="<?php echo $id; ?>"> Удалить </button></p> <?php endif; ?>
        </form>

        <a href="/admin.php"><div>К списку новостей</div></a>

    </body>
</html>