<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';
?>


<?php
	$statment = $pdo->prepare(
		"INSERT INTO comments (text, id) 
		VALUES (:text, :id)"
	);

	$statment->execute([
		":text" => $_POST['comment'],
		":id" => $_POST['id']
	]);

	echo json_encode('ok');

?>

