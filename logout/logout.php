<?php
session_start();
if (isset($_SESSION['username'])) {
   session_destroy();
   echo "<br> you are logged out successufuly!";
}
   echo "<br/><a href='../login/loginView.php'>login</a>";
 ?>
