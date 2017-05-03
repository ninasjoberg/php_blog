
<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';


	$statment = $pdo->prepare(
		"UPDATE pages1
		SET title=:title, body=:body
		WHERE id=:id "
	);

	$statment->execute([
       ":id" => $_POST['editId'],
        ":title" => $_POST['editTitle'],
		":body" => $_POST['editContent']
    ]);

	//redirectar tillbaka till indexsidan. 
	header('Location: ../index.php');
	
	
?>
