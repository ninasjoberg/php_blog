<?php
include_once dirname(__FILE__) . '/../error.php';
include_once dirname(__FILE__) . '/../db.php';
include_once dirname(__FILE__) . '/../classes/posts.php';

  $pdo = Database::connection();
  $db = new Posts($pdo);
  $categories = $db->getCategories('categories');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nmnBlog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="css/blog.css" rel="stylesheet">

  </head>

  <body>
    <div class="blog-masthead">
      <div class="container-fluid">
       
       