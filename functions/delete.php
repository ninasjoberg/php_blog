<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';
    
	$statment = $pdo->prepare(
		"DELETE FROM pages1 
		WHERE id=:id"
	);

	$statment->execute([
        ":id" => $_POST['id']
    ]);

	//redirectar tillbaka till indexsidan. 
	header('Location: ../index.php');

?>