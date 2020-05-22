<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>投稿ページ</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $statement = $db->prepare('DELETE FROM posts WHERE id=?');
        $statement->execute(array($id));
    }
    ?>
    <p>記事を削除しました</p>
    <p><a href="index03.php">戻る</a></p>
    </body>
</html>
