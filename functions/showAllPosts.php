<?php
    include_once dirname(__FILE__) . '/../db.php';
    include_once dirname(__FILE__) . '/../error.php';
    include_once dirname(__FILE__) . '/../classes/posts.php'; 

    $pdo = Database::connection();
    $db = new Posts($pdo);
    $articleList = $db->getAllFrom('posts');
?>
