
<?php
  include 'partials/header.php';
  include 'error.php';


  $pdo = Database::connection();
  $db = new Posts($pdo);
  $posts = $db->getAllFrom('posts');
?>


 <nav class="blog-nav">
  <?php
    if(isset($_GET['category'])) { ?>
      <a class="blog-nav-item" href="index.php">Home</a>
  <?php  } else { ?>
    <a class="blog-nav-item active" href="index.php">Home</a>
    <?php } ?>

        <div class="text-right">
          <a href="login/loginView.php?" class="btn btn-default pull-right">Log in</a>

          <a href="signup/signupView.php?>" class="btn btn-default pull-right">Register</a>

          <a id="btnLogout" href="logout/logout.php" class="btn btn-default">Log out</a>

        </div>
      </nav>

<main>
 <div class="text-left">
<div class="blog-header">
  <h1 class="blog-title">NMNBlog</h1>
</div>


<?php foreach ($posts as $row) { ?>
  <div class="blog-post">
    <h2 class="blog-post-title">
      <a href="singleView.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a>
    </h2>
    <p class="blog-post-meta"><?php echo substr($row['created'], 0, 10); ?> by
      <a href="#"><?php echo $row['author']; ?></a>
    </p>

    <?php $body = $row['body'];
      echo substr($body , 0 , 400) . "...";
    ?>

    <a href="singleView.php?post=<?php echo $row['id'] ?>" class="btn btn-primary">Read more</a>

  </div>

<?php } ?>
<?php
include 'partials/footer.php';
?>

</main>