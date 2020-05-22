<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
    require('./dbconnect.php');

    $id = $_REQUEST['id'];
    
    $categories = $db->prepare('SELECT * FROM categories WHERE id =?');
    $categories->execute(array($id));
    $category = $categories->fetch();

    ?>
    <div>
        <p>【<?php print($category['id']); ?>】CATEGORY NAME：<?php print($category['name']); ?></p>
        <p>[<a href="category_update.php?id=<?php print($category['id']); ?>">編集</a>] [<a href="category_delete.php?id=<?php print($category['id']); ?>" onclick="return confirm('削除してよろしいですか？')">削除</a>]</p>
    </div>
    </body>
</html>
