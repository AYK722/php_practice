<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
    require('./dbconnect.php');

    $id = $_REQUEST['id'];
    
    $posts = $db->prepare('SELECT p.id AS p_id, u.name AS u_name, c.name AS c_name, title, content FROM posts p LEFT JOIN categories c ON p.category_id = c.id LEFT JOIN users u ON p.user_id = u.id WHERE p.id =?');
    $posts->execute(array($_REQUEST['id']));
    $post = $posts->fetch();

    ?>
    <article>
        <p><?php print($post['title']); ?></p>
        <p><?php print($post['content']); ?></p>
        <p><?php print($post['u_name']); ?></p>
        <p><?php print($post['c_name']); ?></p>
    </article>
    </body>
</html>
