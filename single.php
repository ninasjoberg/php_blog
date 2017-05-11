<?php
include ("partials/header.php");
include 'functions/showAllComments.php';
include_once dirname(__FILE__) . '/classes/posts.php'; 

if(isset($_GET['post'])) {
  $id = $_GET['post'];
  $pdo = Database::connection();
  $db = new Posts($pdo);
  $blogPost = $db->getById('posts', $id);
}
?>

<br>
<?php foreach ($blogPost as $row) { ?>
    <div class="blog-post">
      <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
      <p class="blog-post-meta"><?php echo $row['date']; ?> by <a href="#"><?php echo $row['author']; ?></a></p>
      <?php echo $row['body'];?>
    </div>
<?php } ?>


<h3>Comment</h3>
<form action="functions/addComment.php" method="POST" id="comment-form">
  <label>Namn</label>
  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name (Optional)">
	<label>Comment</label>
  <textarea name="comment" rows="20" cols="60" class="form-control"></textarea><br>
	<input type="hidden" value="<?php echo $row['id']?>" name="commentedPostId">
	<input type="submit" value="post" class="btn btn-primary">
</form>
<a href="index.php" class="btn btn-primary">Back</a>

<?php $id = $row['id']; ?>


<h1>Previous comments: </h1>
<ul>
    <?php foreach ($commentList as $row) { 
      if ($row["postId"] == $id) {?>
        <p> <?php echo $row["text"] ?> </p>
        <p> Comment by: <?php echo $row["name"] ?> </p>
        <p> Created: <?php echo $row["created"] ?> </p>
        <hr>
    <?php } }?>
</ul>




<?php include ("partials/footer.php"); ?>

