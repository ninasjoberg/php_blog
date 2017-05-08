<?php 

include ("partials/header.php");

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


    </div><!-- /.blog-post -->
    <?php } ?>

          <blockquote>2 Comments</blockquote>

          <div class="comment-area">
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Namn</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name (Optional)">
              </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Hemsida</label>
            <input type="text" name="website" class="form-control" id="exampleInputEmail1" placeholder="Website (Optional)">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Kommentarer</label>
            <textarea name="comment" rows="10" cols="60" class="form-control"></textarea>
          </div>
          <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
        </form>

        <br>
        <br>
        <hr>

        <div class="comment">
          <div class="comment-head">
           <a href="#">Lisa Eriksson</a>
           <img width="50" height="50" src="img/noim.jpg" class="pull-left">
         </div>
          This is a comment by Lisa Eriksson
        </div>
        <div class="comment">
          <div class="comment-head">
           <a href="#">Nicolas Fuentes</a><button class="btn btn-info btn-xs">Admin</button>
           <img width="50" height="50" src="img/noim.jpg" class="pull-left">
         </div>
          This is a comment by Pelle Nilsson
        </div>


          </div>

        </div><!-- /.blog-main -->

        <?php include ("partials/footer.php"); ?>
