<html>
    <head>
        <meta charset="UTF-8">
        <title>テストページ</title>
    </head>
    <body>
    <script>
    function.delete() {
    </script>
    <?php
    require('./dbconnect.php');

    $posts = $db->prepare('SELECT p.id AS p_id, title, u.name AS u_name, c.name AS c_name FROM posts p LEFT JOIN categories c ON p.category_id = c.id LEFT JOIN users u ON p.user_id = u.id');
    $posts->execute();

?>
    <p>
        <input type="button" value="追加" onclick="location.href='input.html'"> 
        <input type="button" value="ユーザー一覧" onclick="location.href='users.php'">
        <input type="button" value="カテゴリ一覧" onclick="location.href='categories.php'">
    </p>
    <article>
    <?php while ($post = $posts->fetch()): ?>
    <p><a href="post.php?id=<?php print($post['p_id']); ?>"><?php print($post['title']); ?></a>
    [<a href="update.php?id=<?php print($post['p_id']); ?>">編集</a>] [<a href="delete.php?id=<?php print($post['p_id']); ?>" onclick="return confirm('削除してよろしいですか？')">削除</a>]
    </p>
    <p>投稿者：<?php print($post['u_name']); ?> カテゴリ：<?php print($post['c_name']); ?></p>
    <hr>
    <?php endwhile; ?>
    </article>
    </body>
</html>
