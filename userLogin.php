<?php
include 'error.php';
require_once 'db.php';


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

          $statement->bindparam(":userName",$userName);
          $statement->bindparam(":password",$password);

          $statement->execute();

          if($statement->rowCount() == 1){
             echo "User verified and access granted";
             session_start(); //starts login session
        }
        else {
            echo " Incorrect Username and Password";
        }
      }
      else{
          echo "Please enter Username and Password";
      }
    }
}


    