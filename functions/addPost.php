<?php
    include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$pdo = Database::connection();
	$db = new Posts($pdo);

    $title = $_POST['title'];
    $body = $_POST['body'];
    $db->insertPost($title, $body);
?>