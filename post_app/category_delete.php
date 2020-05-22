<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー情報削除完了</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $statement = $db->prepare('DELETE FROM categories WHERE id=?');
        $statement->execute(array($id));
    }
    ?>
    <p>カテゴリー情報を削除しました</p>
    <p><a href="categories.php">戻る</a></p>
    </body>
</html>
