<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザー情報変更完了</title>
    </head>
    <body>
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('UPDATE users SET name=? WHERE id=?');
    $statement->execute(array($_POST['name'], $_POST['id']));

    ?>
    <p>ユーザー情報を変更しました</p>
    <p><a href="users.php">戻る</a></p>
    </body>
</html>
