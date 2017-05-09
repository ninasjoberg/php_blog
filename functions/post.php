<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';

	$statment = $pdo->prepare(
		"INSERT INTO pages1 (title, body)
		VALUES (:title, :body)"
	);

	$statment->execute([
		":title" => $_POST['title'],
		":body" => $_POST['content']
	]);

	//redirectar tillbaka till indexsidan.
	header('Location: ../index.php');

?>
