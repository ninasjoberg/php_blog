<?php
session_start();

include 'classes/posts.php';
include 'db.php';

  $pdo = Database::connection();
  $db = new Posts($pdo);


$user = $_SESSION['user'] = "admin";

$pid = $_GET['pid'];

$query = mysql_query("SELECT * FROM votes WHERE pid='$pid'");
$row = mysql_fetch_assoc($query);

$id = $row['pid'];
$likes = $row['likes'];
$dislikes = $row['dislikes'];

$query = mysql_query("SELECT * FROM voters WHERE username='$user' AND pid='$pid'");
$row1 = mysql_fetch_assoc(query);

$voted = $row1['voted'];
$pid = $row1['pid'];
$username = $row1['username'];

if(isset($_POST['like'])) {
$likes1 = $likes+1;
header("Location: likes.php?pid=$pid");
$update1 = mysql_query("UPDATE votes SET likes='$likes1' WHERE pid='$pid'");
$update2 = mysql_query("UPDATE voters SET voted='1' WHERE username='$user' AND pid='$pid'");
}

if(isset($_POST['dislike'])) {
  $dislikes1 = $dislikes+1;
  header("Location: likes.php?pid=$pid");
  $update3 = mysql_query("UPDATE votes SET dislikes='$dislikes1' WHERE pid='$pid'");
  $update4 = mysql_query("UPDATE voters SET voted='1' WHERE username='$user' AND pid='$pid'");
}

if(isset($pid)){
  if($id == $pid) {

    echo "Likes: $likes <br> Dislikes: $dislikes <br/>";
      if($voted == "1") {
        echo "You can not vote again for this page!";
      }else {
        echo "<form action='' method='POST'><input type='submit' name='like' value='Like'> <input type='submit' name='dislike' value='Dislike'></form>";
      }
  }else  {

        header("Location: likes.php");
  }

}else {
  die("Error: Not Found");
}
 ?>
