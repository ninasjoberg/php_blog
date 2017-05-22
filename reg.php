<?php

include 'partials/header.php';
?>


<div class="wrapper">
<form class="form-signin" action="functions/addUser.php" method="post">
  <h2 class="form-signin-heading">Register a new user<h2>
    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
    <input type="text" class="form-control" name="password" placeholder="Password" required=""/>
    <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus=""><br>
    <input type="submit" name='submit' value="Add user" class="btn btn-lg btn-primary btn-block">
</form>
</div>
