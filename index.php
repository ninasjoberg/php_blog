<?php
  include 'partials/header.php';
  include 'db.php';
  include 'error.php';
  include 'functions/get.php';
?>

<body>

<h3>Create new blog post: </h3>
 <form action="functions/post.php" method="POST">
 	Title:  <br>
    <input type="text" name="title"><br>
    Content: <br>
	<textarea name="content" rows="20" cols="100"> </textarea><br>
    <input type="submit" value="post">
  </form>

<h1>Previous blog posts: </h1>


<?php
   include 'articles.php';
	include 'partials/footer.php';
?>