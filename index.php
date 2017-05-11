
<?php

  include 'partials/header.php';
  include 'error.php';


  $pdo = Database::connection();
  $db = new Posts($pdo);
  $posts = $db->getAllFrom('posts');


?>

<div class="blog-header">
<h1 class="blog-title">NMNBlog</h1>
</div>
<?php foreach ($posts as $row) { ?>
  <div class="blog-post">
  <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a></h2>
  <p class="blog-post-meta"><?php echo $row['date']; ?> by <?php echo $row['author']; ?></p>

  <?php $body = $row['body'];
  echo substr($body , 0 , 400) . "...";
  ?>

  <a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-default">Read more</a>
  </div>

<?php } ?>


<?php
	include 'partials/footer.php';
?>
