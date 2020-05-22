<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザー編集ページ</title>
    </head>
    <body>
        <h2>ユーザー編集</h2>
    <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];    

        $users = $db->prepare('SELECT * FROM users WHERE id =?');
        $users->execute(array($id));
        $user = $users->fetch();
    }
    ?>

        <form action="user_update_do.php" method="post">
            <input type="hidden" name="id" value="<?php print($id); ?>">
            <input name="name" type="text" size="50" value="<?php print($user['name']); ?>"><br>
            <button type="submit">編集する</button>
        </form>
    </body>
</html>
