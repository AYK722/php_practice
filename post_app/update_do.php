<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>投稿ページ</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
    $statement->execute(array($_POST['title'], $_POST['content'], $_POST['id']));

    ?>
    <p>記事の内容を変更しました</p>
    <p><a href="index03.php">戻る</a></p>
    </body>
</html>
