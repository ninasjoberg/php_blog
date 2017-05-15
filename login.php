<?php
session_start();

include 'classes/posts.php';
include 'db.php';

  $pdo = Database::connection();
  $db = new Posts($pdo);
  $posts = $db->getAllFrom('posts');
?>

<h2>Login<h2>

<form action="" method="post">
    <label>Username  :</label>
    <input type="text" name="username"><br>
    <label>Password  :</label>
    <input type="password" name="password"><br>
    <input type="submit" name='submit' value="log in">
</form>


<?php
	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($username == '')
			$errMsg .= 'You must enter your Username<br>';

		if($password == '')
			$errMsg .= 'You must enter your Password<br>';


		if($errMsg == ''){
            $results = $db->getUser($username);
            //var_dump($results[0]['password']);
			if(count($results) > 0 && $password == $results[0]['password']){
                session_start();
                echo $results[0]['username'];
				$_SESSION['username'] = $results[0]['username'];
                ?>
				<script> window.location = 'welcome.php' </script>
                <?php
				exit;
			}else{
				echo $errMsg .= 'Username and Password are not found<br>';
			}
		}
	}
?>
