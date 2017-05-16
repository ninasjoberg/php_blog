<?php
	include '../db.php';
	include '../error.php';
	include '../classes/likes.php';

	$id = $_POST['id'];

    $pdo = Database::connection();
    $db = new Likes($pdo);

    $db->insertLike($id);

?>

<script>  window.location = '/php_blog/single.php?post=48' </script>
