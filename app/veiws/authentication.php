<?php
namespace Controllers;
use Tables as T;
Use Models as M;
use index as i;
include("../../indextest.php");
// adapted From https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

// Initialize the session
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
    $_SESSION["user"]=null;
    $_SESSION["loggedIn"]= false; 
}


echo "<pre>";
print_r($_POST);
echo"</pre>";

$usersController = $container["DbUserController"];
$authUser = $usersController->LoginUser($_POST);

echo "<pre>";
print_r($authUser);
echo"</pre>";
if($authUser != null){

    $_SESSION["user"]=$authUser;
    $_SESSION["loggedIn"]= true;
    
    echo "<pre>";
    print_r($_SESSION);
    echo"</pre>";

    //header("location: veiws/adminPage.php");
}





?>