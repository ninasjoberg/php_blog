<?php
    include '../functions/showPost.php';
    include '../functions/showAllComments.php';
?>


<h1>Blog Post</h1>
<div style='border:solid black 1px;'>
    <h3> <?php echo $article[0]['title'] ?> </h3>
    <p> <?php echo $article[0]['body'] ?> </p>
</div>


<h3>Comment</h3>
<form action="../functions/addComment.php" method="POST" id="comment-form">
	<textarea name="comment" rows="20" cols="100"></textarea><br>
	<input type="hidden" value="<?php echo $article[0]['id']?>" name="commentedPostId">
	<input type="submit" value="post">
</form>
<button id="back">Go back</button>


<h1>Previous comments: </h1>
<ul>
    <?php foreach ($commentList as $row) { ?>
        <div style='border:solid black 1px;'>
            <h3> <?php echo $row["text"] ?> </h3>
        </div>
        <p> Created: <?php echo $row["created"] ?> </p>
        <p> PostId: <?php echo $row["id"] ?> </p>
        <form action="functions/delete.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"]?>" name="id">
            <input type="submit" value="Delete">
        </form>
        <form action="functions/editPost.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"]?>" name="id">
            <input type="submit" value="Edit">
        </form>
    <?php } ?>
</ul>


<script>
    <?php
        include '../js/fetch.js';
    ?>
</script>