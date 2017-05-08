
<?php

  include 'partials/header.php';
  // include 'db.php';
  include 'error.php';
  // include 'functions/get.php';


  if(isset($_GET['category'])) {
  $category = mysqli_real_escape_string($db , $_GET['category']);
  $query = "SELECT * FROM posts WHERE category = '$category'";
} else {
$query = "SELECT * FROM posts";
}
$posts = $db->query($query);

?>

<div class="blog-header">
<h1 class="blog-title">NMNBlog</h1>
</div>
<?php if($posts->num_rows > 0) {
while($row = $posts->fetch_assoc()) {
?>
<div class="blog-post">
<h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a></h2>
<p class="blog-post-meta"><?php echo $row['date']; ?> by <a href="#"><?php echo $row['author']; ?></a></p>

<?php $body = $row['body'];
echo substr($body , 0 , 400) . "...";
?>

<a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-primary">Read more</a>
</div><!-- /.blog-post -->
<?php } } ?>

</div><!-- /.blog-main -->


<?php
    //  include 'articles.php';
	   include 'partials/footer.php';
?>
