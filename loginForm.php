<?php
include 'partials/header.php';
?>

<div class="wrapper">
<form class="form-signin" action="" method="post">
  <h2 class="form-signin-heading">Login<h2>
    <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
    <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
    <label class="checkbox">
      <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
    </label>
    <input type="submit" name="submit" value="Log in" class="btn btn-lg btn-primary btn-block">
</form>
</div>
