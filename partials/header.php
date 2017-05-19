<?php
include_once dirname(__FILE__) . '/../error.php';
include_once dirname(__FILE__) . '/../db.php';
include_once dirname(__FILE__) . '/../classes/posts.php';

  $pdo = Database::connection();
  $db = new Posts($pdo);
  $categories = $db->getCategories('categories');
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

        <?php
          if(isset($_GET['category'])) { ?>
            <a class="blog-nav-item" href="index.php">Home</a>
        <?php  } else { ?>
          <a class="blog-nav-item active" href="index.php">Home</a>
          <?php } ?>

          <?php foreach ($categories as $row) {
              if(isset($_GET['category']) && $row['id'] == $_GET['category']) { ?>
                <a class="blog-nav-item active" href="index.php?category=<?php echo $row['id']; ?>"><?php echo $row['text']; ?></a>
                <?php } else echo "<a class='blog-nav-item' href='index.php?category=$row[id]'>$row[text]</a>";
              }?>
              <div>
                <a href="loginForm.php?" class="btn btn-default pull-right">Log in</a>

                <a href="welcome.php?>" class="btn btn-default pull-right">Register</a>

              </div>
            </nav>
        </div>
      </div>
  </div>
</body>
