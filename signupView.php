<?php

   // include 'partial/footer.php';
    include 'partials/header.php';

    include 'error.php';

?>


<div class="wrapper">
<form class="form-signin" action="userData.php" method="post">
  <h2 class="form-signin-heading">Register a new user<h2>
    <input type="text" class="form-control" name="userName" placeholder="Username" required="" autofocus="" /> <br>
    <input type="text" class="form-control" name="password" placeholder="Password" required=""/> <br>
    <input type="firstName" class="form-control" name="firstName" placeholder="First name" required="" autofocus=""><br>
    <input type="lastName" class="form-control" name="lastName" placeholder="Last name" required="" autofocus=""><br>
    <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus=""><br>
    <input type="submit" name='submit' value="Add user" class="btn btn-lg btn-primary btn-block">
</form>
</div>
