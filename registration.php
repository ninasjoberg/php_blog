 <?php
  // include 'partials/header.php';
  include 'error.php';
  include 'db.php';

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

</div><!-- /.blog-main -->



      <form class="" action="index.php" method="post">
        	<div class="form-group">
          		<label for="lastName">Last Name</label>
          		<input type="text" name="lastName" id="lastName" class="form-control">
       		</div>

                    <br><br>

       <form class="" action="index.php" method="post">
        	<div class="form-group">
          		<label for="email">email</label>
          		<input type="text" name="email" id="email" class="form-control">
        	</div>
                    <br><br>


			<div class="form-group">
          		<input type="submit" class="btn btn-primary" value="submit">
       		</div>

<?php
}else{
	print_r($_post);
}
?>

<?php
include 'partials/footer.php';

?>
