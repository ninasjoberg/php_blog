<?php
include 'classes/posts.php'; 
include 'db.php';
?>



<h4>or Register a new user<h4>

<form action="functions/addUser.php" method="post">
    <label>Username  :</label>
    <input type="text" name="username"><br>
    <label>Password  :</label>
    <input type="password" name="password"><br>
     <label>email  :</label>
    <input type="email" name="email"><br>
    <input type="submit" name='submit' value="add to db">
</form>


