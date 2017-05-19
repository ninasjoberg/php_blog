<?php
	include '../db.php';
	include '../error.php';
	include '../classes/comments.php';

	$errorMessage = '';
	$response = null;

	$id = $_POST['commentedPostId'];
	$name = trim(htmlspecialchars($_POST['name']));
	$text = trim(htmlspecialchars($_POST['comment']));

	if($name == ""){
		$errorMessage .= 'You must enter your name. ';
		$response = json_encode(array('status' => 400, 'message' => $errorMessage));
	}

	if($text == ''){
		$errorMessage .= 'You must enter a comment. ';
 		$response = json_encode(array('status' => 400, 'message' => $errorMessage));
	}

	if($errorMessage == ''){
		$pdo = Database::connection();
		$db = new Comments($pdo);
		$db->insertComment($text, $id, $name);
		$response = json_encode(array('status' => 200, 'text' => $text, 'name' => $name, 'created' => date("Y-m-d h:i:sa")));
	}

	echo $response;
?>

