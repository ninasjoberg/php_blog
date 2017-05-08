 <?php
  include 'partial/header.php';
  include 'config.php';
  include 'error.php';
  include 'database.php';

?>

<?php
if (empty($_post)){
?>

<body>
	
	<form class="" action="index.php" method="post">
        <div class="form-group">
             <h2 class="">Sign up</h2>
        </div>

        <br><br>

	<form class="" action="index.php" method="post">
        	<div class="form-group">
          		<label for="userName">UserName</label>
          		<input type="text" name="userName" id="userName" class="form-control">
       		 </div>

        <br><br>

	<form class="" action="index.php" method="post">
        	<div class="form-group">
          		<label for="password">Password</label>
          		<input type="text" name="password" id="password" class="form-control">
        	</div>
        

      <br><br>

     <form class="" action="index.php" method="post">
        	<div class="form-group">
          		<label for="firstName">First Name</label>
          		<input type="text" name="firstName" id="firstName" class="form-control">
        	</div>

                    <br><br>

<?php
include 'partials/footer.php';
?>              