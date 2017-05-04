<?php
  include '../partials/header.php';
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

<button id="back">Go back</button>


<script>
let form = document.getElementById('edit-blog-form');

form.addEventListener('submit', function(event){
  
  //Prevent form from submitting
  event.preventDefault();

  //Do post request to php
  fetch('edit.php', {
    method: 'POST',
    body: new FormData(this) //format input-fields
  })
  .then(data => data.text())
  .then(text => window.location='../index.php');
});



const back = document.getElementById('back');

back.addEventListener('click', redirect);

function redirect(event){
	window.location='../index.php'	
}
</script>

<?php
  	include '../partials/footer.php';
?>