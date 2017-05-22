
<?php

include 'error.php';
require_once 'user.php';
//require_once 'userData.php';

class UserDatabase
{

          private $pdo;
 
           public   function __construct()
          {

             $this->pdo = (new Database())->connection();
          }

      public function checkUser($userName, $password, $firstName, $lastName, $email)
      {

            // $userName = $userName;
            // // $password = ($_POST['password']);
            // // $firstName =($_POST['firstName']); 
            // // $lastName = ($_POST['lastName']); 
            // // $email    = ($_POST['email']);

            // echo "hello". $userName;

            if($userName)
              {

                if(strlen($password) < 6)
                  {

                    echo "Password must be atleast 6 characters!";  

                  }

                    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 

                  {

                  echo "Please enter a valid email address!";

                  } 



                  if(isset($_POST['submit'])) 

                {
                    $statement =$this->pdo->prepare("SELECT  userName, email FROM users WHERE userName = :userName OR email= :email");
                    /*$statement =$this->pdo->prepare("SELECT  ´userName´, ´email´ FROM users WHERE ´userName´ = ':userName', OR ´email` = ':email'");*/

                    $statement->execute(array(":userName"=>$userName, ":email"=>$email));

                    $row=$statement->fetch(PDO::FETCH_ASSOC);

                    if($row['userName']==$userName)

                    { 

                     echo  "Sorry username already taken!";

                    } 

                      else if($row['email']==$email)

                    {

                      echo "Sorry email id already taken!";

                    } 


                   
                }

              }

              $user= new User();
 
              $user->register($userName,$password,$firstName,$lastName,$email); 
        }
       
}




