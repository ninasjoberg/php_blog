<?php
include 'error.php';
include 'db.php';
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
    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="css/blog.css" rel="stylesheet">

  </head>

  <body>
    <div class="blog-masthead">
      <div class="container-fluid">
        <nav class="blog-nav">


          <?php
         // var_dump($_GET['category']);

         // $categories = $db->getOneCategorie('categories', $_GET['category']);
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
              <a href="signIn.php?post=<?php echo $row['id'] ?>" class="btn btn-secondary pull-right">Log in</a>
              <a href="registration.php?post=<?php echo $row['id'] ?>" class="btn btn-secondary pull-right">Sign up</a>
            </div>

        </nav>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
