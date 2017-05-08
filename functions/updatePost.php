
<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$pdo = Database::connection();
	$db = new Posts($pdo);

    $title = $_POST['editTitle'];
    $body = $_POST['editBody'];
	$id = $_POST['editPostId'];
    $db->updatePost($title, $body, $id);
?>

