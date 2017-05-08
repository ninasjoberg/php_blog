 
<?php

include 'config.php';
include 'error.php';

 $statment = $pdo->prepare(
        "INSERT INTO users (userName,password,firstName,lastName,email) 
             VALUES (:userName,:password,:firstName, :lastName, :email)"
    );

    $statment->execute([

        ":userName"  => $_POST['userName'],
        ":password"  => $_POST['password'],
        ":firstName" => $_POST['firstName'],
        ":lastName"  => $_POST['lastName'],
        ":email" 	 => $_POST['email'],

    ]);

