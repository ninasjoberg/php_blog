
<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';

	$errorMessage = '';
	$response = null;

    $title = trim(htmlspecialchars($_POST['editTitle']));
    $body = trim(htmlspecialchars($_POST['editBody']));
	$id = $_POST['editPostId'];

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
        $db->updatePost($title, $body, $id);
		$response = json_encode(array('status' => 200, 'title' => $title, 'body' => $body, 'updated' => date("Y-m-d h:i:sa")));
	}
	echo $response;
?>	