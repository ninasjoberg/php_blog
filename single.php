<?php
include ("partials/header.php");
include 'functions/showAllComments.php';
include 'functions/showAllLikes.php';
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
      <p class="blog-post-meta"><?php echo $row['date']; ?> by
        <a href="#"><?php echo $row['author']; ?></a>
      </p>
      <p class="blog-post-meta"><?php echo substr($row['created'], 0, 10); ?></p>
      <?php echo $row['body'];?>
    </div>
    <form action="functions/addLike.php" method="POST" id="like-form">
        <input type="hidden" value="<?php echo $row["id"]?>" name="id">
        <input type="submit" value="Like" name="like" class="btn btn-primary">
    </form>
    <?php } ?>

<h4>Number of likes: <?php if($likes != array()){
    echo $likes[0]['likes'];
    }else{echo 0; }?>
</h4>
<br>


<h3>Comment</h3>
<form action="functions/addComment.php" method="POST" id="comment-form">
  <label>Namn</label>
  <input type="text" name="name" class="form-control" placeholder="Name (Optional)">
	<label>Comment</label>
  <textarea name="comment" rows="20" cols="60" class="form-control"></textarea><br>
	<input type="hidden" value="<?php echo $row['id']?>" name="commentedPostId">
	<input type="submit" value="post" name='submit' class="btn btn-primary">
</form>
<a href="index.php" class="btn btn-primary">Back</a>

<?php $id = $row['id']; ?>


<h1>Previous comments: </h1>
<ul id="comment-list">
  <?php foreach ($commentList as $row) {
    if ($row["postId"] == $id) {?>
      <li>
        <p> <?php echo $row["text"] ?> </p>
        <p> Comment by: <?php echo $row["name"] ?> </p>
        <p> Created: <?php echo $row["created"] ?> </p>
      </li>
      <hr>
  <?php } }?>
</ul>

<?php
include 'partials/footer.php';
?>

<script><?php include 'js/fetch.js'; ?></script>
