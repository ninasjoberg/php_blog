<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$id = $_POST['id'];

    $pdo = Database::connection();
    $db = new Posts($pdo);

    $db->insertLike($id);

?>

<script>  window.location = '/php_blog/single.php' </script>