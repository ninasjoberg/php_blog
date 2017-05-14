<?php
	include '../db.php';
	include '../error.php';
	include '../classes/posts.php';
    
	$pdo = Database::connection();
	$db = new Posts($pdo);

	$id = $_POST['id'];
    $db->deletePost($id);
	
	$response = json_encode(array('status' => 200, 'id' => $id));
	echo $response;
?>