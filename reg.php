<?php
include 'classes/posts.php'; 
include 'db.php';
?>

<h2>Registration<h2>

<form action="functions/addUser.php" method="post">
    <label>Username  :</label>
    <input type="text" name="username"><br>
    <label>Password  :</label>
    <input type="password" name="password"><br>
     <label>email  :</label>
    <input type="email" name="email"><br>
    <input type="submit" name='submit' value="log in">
</form>


