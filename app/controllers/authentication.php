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
    $_Session["loggedIn"]= false; 
}
include("../../indextest.php");

$usersController = $container["DbUserController"];
$authUser = $usersController->LoginUser($_Post);
if(user != null){

    $_Session["user"]=$authUser;
    $_SESSION["loggedIn"]= true;
    header("location: veiws/adminPage.php");
}





?>