<?php
    session_start();
    echo 'You are logged in as: ' . $_SESSION['username'];
    include_once dirname(__FILE__) . '/../partials/createPostForm.php';
    include_once dirname(__FILE__) . '/../functions/showAllPosts.php';
    include_once dirname(__FILE__) . '/../error.php';
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
    <?php } ?>
</ul>


