
<?php

include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';
require_once 'user.php';

class UserDatabase
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())::connection();
    }

    public function checkUser($userName, $password, $firstName, $lastName, $email)
    {
        $error='';

        if ($userName) {
            if (strlen($password) < 6) {
               ?>
                <script> alert( "Password must be atleast 6 characters!"); </script>
                <?php
                $error= 'error';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                ?>
                 <script> alert( "Please enter a valid email address!"); </script>
                  <?php
                  $error= 'error';
            }

            if (isset($_POST['submit'])) {
                $statement =$this->pdo->prepare("SELECT  userName, email FROM users WHERE userName = :userName OR email= :email");

                $statement->execute(array(":userName"=>$userName, ":email"=>$email));

                $row=$statement->fetch(PDO::FETCH_ASSOC);

                if ($row['userName']==$userName) {
                    ?>
                     <script> alert( "Sorry username already taken!");</script>
                        <?php
                        $error= 'error';
                } elseif ($row['email']==$email) {
                    ?>
                     <script> alert( "Sorry email id already taken!");</script>
                    <?php
                    $error= 'error';
                }
            }
        }
        if($error==''){
          $password =  md5($_POST['password']);
          $user= new User();
          $user->register($userName, $password, $firstName, $lastName, $email);
           ?>
              <script>  window.location = '../login/loginViewNewUser.php' </script>
            <?php
        }  
    }
}
?>
