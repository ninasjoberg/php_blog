<?php
    include 'partials/createPostForm.php';
    include 'functions/showAllPosts.php';
?>

<h1>Previous blog posts: </h1>
<ul>
    <?php foreach ($articleList as $row) { ?> 
        <div style='border:solid black 1px;'>
            <h3> <?php echo $row["title"] ?> </h3>
            <p> <?php echo $row["body"] ?> </p>
        </div>
        <p> Created: <?php echo $row["created"] ?> </p>
        <p> Updated: <?php echo $row["updated"] ?> </p>
        <form action="functions/delete.php" method="POST" id="deletePost">
            <input type="hidden" value="<?php echo $row["id"]?>" name="id">
            <input type="submit" value="Delete">
        </form>
        <form action="views/editPostView.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"]?>" name="id">
            <input type="submit" value="Edit">
        </form>
        <form action="views/commentsView.php" method="POST">
            <input type="hidden" value="<?php echo $row["id"]?>" name="id">
            <input type="submit" value="Comment">
        </form>
    <?php } ?>
</ul>

<script><?php include '../js/fetch.js'; ?></script>
