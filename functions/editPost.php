<?php
	include '../db.php';
	include '../error.php';
	include 'get.php';

$db = new DataBase_blog($pdo);
$editArticle = $db->getById('pages1', $_POST['id']);

?>

<h3>Edit blog post: </h3>
<form action="edit.php" method="POST" id="edit-blog-form">
Title:  <br>
 <input type="text" name="editTitle" value="<?php echo $editArticle[0]['title']?>"><br>
 Content: <br>
<textarea name="editContent" rows="20" cols="100"><?php echo $editArticle[0]['body']?></textarea><br>
<input type="hidden" value="<?php echo $editArticle[0]['id']?>" name="editId">
<input type="submit" value="post">
</form>


