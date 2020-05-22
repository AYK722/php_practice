<html>
    <head>
        <meta charset="UTF-8">
        <title>ユーザー一覧</title>
    </head>
    <body>
    <script>
    function.delete() {
    </script>
    <?php
    require('./dbconnect.php');

    $users = $db->prepare('SELECT * FROM users');
    $users->execute();

    ?>

    <h2>ユーザー一覧</h2>
    <div>
    <?php while ($user = $users->fetch()): ?>
    <p><?php print($user['id']); ?>：<a href="user.php?id=<?php print($user['id']); ?>"><?php print($user['name']); ?></a></p>
    <hr>
    <?php endwhile; ?>
    </div>
    <p><a href="index03.php">記事一覧に戻る</a><p>
    </body>
</html>
