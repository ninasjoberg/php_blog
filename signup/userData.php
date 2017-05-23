<?php
include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';
require_once 'signup.php';

    $userName = ($_POST['userName']);
    $password = ($_POST['password']);
    $firstName =($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $email    = ($_POST['email']);

$userdatabase = new UserDatabase;
$userdatabase->checkUser($userName,$password,$firstName,$lastName,$email);
?>

<?php

include 'signupView.php';

?>
