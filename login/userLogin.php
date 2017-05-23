<?php
include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';
require_once '../db.php';
session_start();


class User
{
  
    private $pdo;
 
    public  function __construct()
    {
      $this->pdo = (new Database())::connection();
    }
 
    public function login($userName, $password)
    {  

      if(!empty($userName) && !empty($password))
      {
          $statement = $this->pdo->prepare("SELECT * FROM users where userName=:userName and password=:password");

          $hashpassword = md5($password);
          $statement->bindparam(":userName",$userName);
          $statement->bindparam(":password", $hashpassword); 

          $statement->execute();

        if($statement->rowCount() == 1){
            //echo "User verified and access granted";
            $_SESSION['username'] = $userName;
             ?>
              <script>  window.location = '../views/createPostView.php' </script>
            <?php
        }
        else {
            ?>
            <script> alert("Incorrect Username and Password"); </script>
            <?php
        }
    }
    else{
        ?>
        <script> alert("Please enter Username and Password"); </script>
        <?php
    }
  }
}


    