<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
    require('./dbconnect.php');

    $id = $_REQUEST['id'];
    
    $users = $db->prepare('SELECT * FROM users WHERE id =?');
    $users->execute(array($_REQUEST['id']));
    $user = $users->fetch();

    ?>
    <h2>ユーザー詳細</h2>
    <div>
        <p>NO.：<?php print($user['id']); ?></p>
        <p>NAME：<?php print($user['name']); ?></p>
        <p>AGE：<?php print($user['age']); ?></p>
        [<a href="user_update.php?id=<?php print($user['id']); ?>">編集</a>] [<a href="user_delete.php?id=<?php print($user['id']); ?>" onclick="return confirm('削除してよろしいですか？')">削除</a>]
    </div>
    </body>
</html>
