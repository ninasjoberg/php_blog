<?Php
include_once dirname(__FILE__) . '/../error.php';
//include 'error.php';
include 'userLogin.php';

if(isset($_POST['submit']))
{
    $userName = ($_POST['userName']);
    $password = ($_POST['password']);

    $user= new User();
    $user->login($userName,$password);
}

?>

<?php

include 'loginView.php';

?>
