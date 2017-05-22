<?php
// session_start();
echo 'You are logged in as: ' . $_SESSION['username'];
    include_once dirname(__FILE__) . '/../functions/showAllPosts.php';
    include_once dirname(__FILE__) . '/../error.php';
    // include_once dirname(__FILE__) . '/../partials/header.php';



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nmnBlog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="css/blog.css" rel="stylesheet">

  </head>

  <body>
    <div class="blog-masthead">
      <div class="container-fluid">
        <div class="text-center">
        <nav class="blog-nav">



              </div>
            </nav>
        </div>
      </div>
  </div>
</body>



<a id="btnLogout" href="logout.php" class="btn btn-primary">Log out</a>


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

<?php
include_once dirname(__FILE__) .'/../partials/footer.php';

?>


<script><?php include '../js/fetch.js'; ?></script>
