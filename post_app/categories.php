<html>
    <head>
        <meta charset="UTF-8">
        <title>カテゴリー一覧</title>
    </head>
    <body>
    <script>
    function.delete() {
    </script>
    <?php
    require('./dbconnect.php');

    $categories = $db->prepare('SELECT * FROM categories');
    $categories->execute();

    ?>
    <h2>カテゴリー一覧</h2>

    <div>
    <?php while ($category = $categories->fetch()): ?>
    <p><?php print($category['id']); ?>：<a href="category.php?id=<?php print($category['id']); ?>"><?php print($category['name']); ?></a></p>
    <hr>
    <?php endwhile; ?>
    </div>
    <p><a href="index03.php">記事一覧に戻る</a><p>
    </body>
</html>
