<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

		$errorMessage = '';
		$response = array();

		$id = $_POST['commentedPostId'];
		$name = trim($_POST['name']);
		$text = trim($_POST['comment']);

		if($name == ""){
			$errorMessage .= 'You must enter your name. ';
			echo json_encode(array('status' => 400, 'message' => $errorMessage));
		}

		if($text == ''){
			$errorMessage .= 'You must enter a comment. ';
			echo json_encode(array('status' => 400, 'message' => $errorMessage));
		}

		if($errorMessage == ''){
			$pdo = Database::connection();
			$db = new Posts($pdo);
			$db->insertComment($text, $id, $name);
			echo json_encode(array('status' => 200, 'text' => $text, 'name' => $name, 'created' => date("Y-m-d h:i:sa")));
		}
		
		else {
			$errorMessage = 'something went wront';
			$response = array('status' => 500, 'message' => $errorMessage);
			echo json_encode($response);
		}
?>

