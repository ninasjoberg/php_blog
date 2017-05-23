<?php
    include_once dirname(__FILE__) . '/../db.php';
    include_once dirname(__FILE__) . '/../error.php';
    include_once dirname(__FILE__) . '/../classes/dislikes.php';

    if(isset($_GET['post'])) {
        $pid = $_GET['post'];
        $pdo = Database::connection();
        $db = new Dislikes($pdo);
        $dislikes = $db->getDislikesByPid($pid);
    }
?>
