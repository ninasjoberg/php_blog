<?php
    include_once 'db.php';
    include 'error.php';
    include_once dirname(__FILE__) . '/../classes/posts.php'; 

    $pdo = Database::connection();
    $db = new Posts($pdo);
    $articleList = $db->getAllFrom('pages1');
?>
