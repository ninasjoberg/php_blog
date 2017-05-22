<?Php
include 'error.php';

require_once 'userLogin.php';

if(isset($_POST['submit'])) 
 {

    $userName = ($_POST['userName']);
    $password = ($_POST['password']);


    $user= new User();
    $user->login($userName,$password);

}

?>

