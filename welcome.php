<?php

	session_start();
	echo 'Welcome '.$_SESSION['username'];

?>

<a href="views/createPostView.php" class="btn btn-primary">Create Post</a>

<a id="btnLogout" href="logout.php" class="btn btn-primary">Log out</a>


<?php
	include 'reg.php';
?>
