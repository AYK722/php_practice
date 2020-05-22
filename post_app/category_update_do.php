<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー情報変更完了</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('UPDATE categories SET name=? WHERE id=?');
    $statement->execute(array($_POST['name'], $_POST['id']));

    ?>
    <p>カテゴリー情報を変更しました</p>
    <p><a href="categories.php">戻る</a></p>
    </body>
</html>
