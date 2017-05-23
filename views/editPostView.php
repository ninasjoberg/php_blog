<?php
    include '../functions/showPost.php';
    include_once dirname(__FILE__) . '/../partials/header.php';
?>

<h3>Edit blog post: </h3>
<form action="../functions/updatePost.php" method="POST" id="edit-blog-form">
    Title:  <br>
    <input type="text" name="editTitle" value="<?php echo $article[0]['title']?>"><br>
    Content: <br>
    <textarea name="editBody" rows="20" cols="100"><?php echo $article[0]['body']?></textarea><br>
    <input type="hidden" value="<?php echo $article[0]['id']?>" name="editPostId">
    <input class="btn btn-primary" type="submit" value="post">
</form>
<br>
<a href="createPostView.php" class="btn btn-primary">Back</a>

<script><?php include '../js/fetch.js'; ?></script>