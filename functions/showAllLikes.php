 <?php
    include_once 'db.php';
    include 'error.php';
    include_once 'classes/likes.php';  

    if(isset($_GET['post'])) {
        $pid = $_GET['post'];
        $pdo = Database::connection();
        $db = new Likes($pdo);
        $likes = $db->getLikesByPid($pid);
    }  
?>    
