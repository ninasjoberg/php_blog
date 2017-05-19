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

<div class="wrapper">
 <form action="../index.php">
   <h2 class="form-signin-heading"> Welcome to our blog </h2>
   <input type="submit" name="submit" value="Back to blog" class="btn btn-lg btn-default">
 </form>
</div>
