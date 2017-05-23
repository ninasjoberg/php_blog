<?php
include 'partials/header.php';
include 'error.php';


?>
<p  class="blog-post-title text-center"> <br>
<?php echo 'Welcome to our blog!' . '<br>' . 'Please login to create a blog post';?> 
</p>
 

  <div class="wrapper">
  <form class="form-signin" action="login.php" method="post">
    <h2 class="form-signin-heading">Login<h2>
      <input type="text" class="form-control" name="userName" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <input type="submit" name="submit" value="Log in" class="btn btn-lg btn-primary btn-block">
   </form>
  </div>
