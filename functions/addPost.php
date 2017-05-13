<?php
    session_start();

    echo 'hej';

    include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$pdo = Database::connection();
	$db = new Posts($pdo);

    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_SESSION['username'];
    $db->insertPost($title, $body, $author);
?>