<?php
include '../partials/header.php';
include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';


?>
<h2 class="blog-post-title text-center"> <br>
<?php echo 'Welcome to our blog!' . '<br>' . 'Please login to create a blog post';?> 
</h2>
<br>

  <div class="wrapper" style="width:20%; margin:auto;">
  <form class="form-signin" action="login.php" method="post">
    <h2 class="form-signin-heading">Login<h2>
      <input type="text" class="form-control" name="userName" placeholder="Username" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br>
      <input type="submit" name="submit" value="Log in" class="btn btn-lg btn-primary btn-block">
   </form>
  </div>
