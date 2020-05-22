<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>投稿ページ</title>
    </head>
    <body>
        <h2>記事作成</h2>
    <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];    

        $posts = $db->prepare('SELECT p.id AS p_id, u.name AS u_name, c.name AS c_name, title, content FROM posts p LEFT JOIN categories c ON p.category_id = c.id LEFT JOIN users u ON p.user_id = u.id WHERE p.id =?');
        $posts->execute(array($id));
        $post = $posts->fetch();
    }
    ?>

        <form action="update_do.php" method="post">
        <input type="hidden" name="id" value="<?php print($id); ?>">
        <input name="title" type="text" size="50" value="<?php print($post['title']); ?>"><br>
            <textarea name="content" cols="50" rows="10"><?php print($post['content']); ?></textarea><br>
            <button type="submit">編集する</button>
        </form>
    </body>
</html>
