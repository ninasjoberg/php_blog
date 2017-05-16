<?php
    include_once dirname(__FILE__) . '/../db.php';
    include_once dirname(__FILE__) . '/../error.php';
    include_once dirname(__FILE__) . '/../classes/likes.php';

    public function totalLikes($id){
    $pdo = Database::connection();
    $db = new Likes($pdo);
    $likesByPost = $db->getAllLikes('votes', $id);
    return $likesByPost;
    }
?>
