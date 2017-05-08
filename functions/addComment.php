<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$pdo = Database::connection();
	$db = new Posts($pdo);

    $id = $_POST['commentedPostId'];
    $text = $_POST['comment'];
    $db->insertComment($text, $id);
?>