<?php
	include '../db.php';
	include '../error.php';
	include '../classes/users.php';

	$pdo = Database::connection();
	$db = new Users($pdo);

    $username = $_POST['username'];
    $password = $_POST['password'];
	$email = $_POST['email'];
    $db->insertUser($username, $password, $email);
?>