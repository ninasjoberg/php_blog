<?php
    session_start();

    include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

    $errorMessage = '';
	$response = null;

    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $author = $_SESSION['username'];

	if($title == ""){
		$errorMessage .= 'You must enter a title ';
		$response = json_encode(array('status' => 400, 'message' => $errorMessage));
	}

	if($body == ''){
		$errorMessage .= 'You must enter some content ';
		$response = json_encode(array('status' => 400, 'message' => $errorMessage));
	}

	if($errorMessage == ''){
        $pdo = Database::connection();
	    $db = new Posts($pdo);
        $insertedId = $db->insertPost($title, $body, $author);
		$response = json_encode(array('status' => 200, 'title' => $title, 'body' => $body, 'author' => $author, 'created' => date("Y-m-d h:i:sa"), 'id' => $insertedId));
	}

	echo $response;
?>