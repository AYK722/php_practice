<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>投稿ページ</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('INSERT INTO posts SET title=?, content=?');
    $statement->bindparam(1, $_POST['title']);
    $statement->bindparam(2, $_POST['content']);
    $statement->execute();

    ?>
    <p>投稿しました</p>
    <p><a href="index03.php">一覧に戻る</a></p>
    </body>
</html>
