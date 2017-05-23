<?php
include '../partials/header.php';
include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';
?>

<a href="../index.php" class="btn btn-primary">Back</a>


<div class="wrapper" style="width:20%; margin:auto; margin-top:5rem;">
<form class="form-signin" action="login.php" method="post">
  <h2 class="form-signin-heading">Login<h2>
    <input type="text" class="form-control" name="userName" placeholder="Username" required="" autofocus="" /><br>
    <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br>
    <input type="submit" name="submit" value="Log in" class="btn btn-lg btn-primary btn-block">
  </form>
</div>
