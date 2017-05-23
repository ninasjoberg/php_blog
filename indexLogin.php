<?php

include 'partial/header.php';
include 'error.php';
?>

<body>

  <form  action="login.php" method="post">
        <div class="form-group">
             <h2 class="">Sign in</h2>
        </div>

      <br><br>

        <div class="form-group">
              <label for="userName">UserName</label>
              <input type="text" name="userName">
           </div>

        <br><br>

          <div class="form-group">
              <label for="password">Password</label>
              <input type="text" name="password">
          </div>

            <br><br>

           <div class="form-group">
              <input type="submit" name="submit">
          </div>
</form>
