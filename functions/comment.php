<?php
	include '../partials/header.php';
	include '../db.php';
	include '../error.php';
	include 'get.php';

$db = new DataBase_blog($pdo);
$commentArticle = $db->getById('pages1', $_POST['id']);

var_dump($commentArticle[0]['id']);
?>

<h3>Comment </h3>
<form action="addComment.php" method="POST" id="comment">
<textarea name="comment" rows="20" cols="100"></textarea><br>
<input type="hidden" value="<?php echo $commentArticle[0]['id']?>" name="id">
<input type="submit" value="post">
</form>

<button id="back">Go back</button>

<h1>Previous comments: </h1>

<?php
  	include 'commentsView.php';
?>


<script>
let form = document.getElementById('comment');

form.addEventListener('submit', function(event){
  
  //Prevent form from submitting
  event.preventDefault();

  //Do post request to php
  fetch('addComment.php', {
    method: 'POST',
    body: new FormData(this) //format input-fields
  })
  .then(data => data.text())
  .then(text => window.location='comment.php');
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