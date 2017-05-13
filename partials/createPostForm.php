<?php include_once dirname(__FILE__) . '/../error.php'; ?>

<h3>Create new blog post: </h3>
<form action="../functions/addPost.php" method="POST" id="post-form">
 	  Title:  <br>
    <input type="text" name="title"><br>
    Content: <br>
	  <textarea name="body" rows="20" cols="100"> </textarea><br>
    <input type="submit" value="post">
</form>


   