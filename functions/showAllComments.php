 <?php
    include_once 'db.php';
    include 'error.php';
    include_once 'classes/posts.php';  
    
    $pdo = Database::connection();
    $db = new Posts($pdo);
    $commentList = $db->getAllFrom('comments');
?>    
