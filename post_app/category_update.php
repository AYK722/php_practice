<?php require('dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>カテゴリー編集ページ</title>
    </head>
    <body>
        <h2>カテゴリー編集</h2>
    <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
        $id = $_REQUEST['id'];    

        $categories = $db->prepare('SELECT * FROM categories WHERE id =?');
        $categories->execute(array($id));
        $category = $categories->fetch();
    }
    ?>

        <form action="category_update_do.php" method="post">
            <input type="hidden" name="id" value="<?php print($id); ?>">
            <input name="name" type="text" size="50" value="<?php print($category['name']); ?>"><br>
            <button type="submit">編集する</button>
        </form>
    </body>
</html>
