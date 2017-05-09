 
<?php

include 'config.php';
include 'error.php';

 $statment = $pdo->prepare(
        "INSERT INTO users (username,password,firstName,lastName,email) 
             VALUES (:username,:password,:firstName, :lastName, :email)"
    );

    $statment->execute([

        ":username"  => $_POST['username'],
        ":password"  => $_POST['password'],
        ":firstName" => $_POST['firstName'],
        ":lastName"  => $_POST['lastName'],
        ":email" 	 => $_POST['email'],

    ]);




