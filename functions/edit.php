
<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';


	$statment = $pdo->prepare(
		"UPDATE pages1
		SET title=:title, body=:body, updated=:updated
		WHERE id=:id "
	);

	$statment->execute([
       ":id" => $_POST['editId'],
        ":title" => $_POST['editTitle'],
		":body" => $_POST['editContent'],
		":updated" => date("Y-m-d h:i:sa")
    ]);

	echo json_encode('ok');

?>

