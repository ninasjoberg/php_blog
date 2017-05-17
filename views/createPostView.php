<?php
    session_start();
    echo 'You are logged in as: ' . $_SESSION['username'];
    include_once dirname(__FILE__) . '/../functions/showAllPosts.php';
    include_once dirname(__FILE__) . '/../error.php';
?>

<h3>Create new blog post: </h3>
<form action="../functions/addPost.php" method="POST" id="post-form">
 	  Title:  <br>
    <input type="text" name="title"><br>
    Content: <br>
	  <textarea name="body" rows="20" cols="100"> </textarea><br>
    <input type="submit" value="post">
</form>


<h1>Previous blog posts: </h1>
<ul id="blogPost-list">
    <?php foreach ($articleList as $row) { ?> 
        <li id="<?php echo $row["id"]?>">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row["title"] ?></h2>
                <p> <?php echo $row["body"] ?> </p>
            </div>
            <div class="blog-post-meta">
                <p> Created: <?php echo $row["created"] ?> </p>
                <p> Updated: <?php echo $row["updated"] ?> </p>
                <p> Posted by: <?php echo $row["author"] ?> </p>
            </div>
            <?php if($_SESSION['username'] == "admin"){ ?>
                <form action="functions/delete.php" method="POST" class="deletePost">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                    <input type="submit" value="Delete">
                </form>
                <form action="editPostView.php" method="POST" class="editPost">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                    <input type="submit" value="Edit">
                </form>
            <?php  }else if($_SESSION['username'] == $row['author']){ ?>
                <form action="editPostView.php" method="POST" class="editPost">
                    <input type="hidden" value="<?php echo $row["id"]?>" name="id">
                    <input type="submit" value="Edit">
                </form>
          <?php  } ?>
         </li>   
    <?php } ?>
</ul>

<script><?php include '../js/fetch.js'; ?></script>
