<?php

include 'error.php';

//include 'db.php';
require_once 'signup.php';



  			$userName = ($_POST['userName']);
            $password = md5($_POST['password']);
            $firstName =($_POST['firstName']); 
            $lastName = ($_POST['lastName']); 
            $email    = ($_POST['email']);

$userdatabase = new UserDatabase;

$userdatabase->checkUser($userName,$password,$firstName,$lastName,$email);