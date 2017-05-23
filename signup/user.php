
<?php

require_once '../db.php';


class User{

    private $pdo;

    public   function __construct()
        {
        $this->pdo = (new Database())::connection();
        }


    public function register($userName,$password,$firstName,$lastName,$email)
    {
        $statement =$this->pdo->prepare("INSERT INTO users (userName, password,firstName,lastName,email)
        VALUES (:userName, :password, :firstName, :lastName, :email)");

        $statement->bindparam(":userName", $userName);
        $statement->bindparam(":password", $password);
        $statement->bindparam(":firstName", $firstName);
        $statement->bindparam(":lastName", $lastName);
        $statement->bindparam(":email", $email);

        $statement->execute();

        return $statement; 
    }
}

?>

