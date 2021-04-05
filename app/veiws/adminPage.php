<?php

session_start();

if(!$_SESSION["loggedIn"]){
    header("location: home.php");
}
include("common/userSettings.php");
$currentUser = $_SESSION["user"];

if ($current->permissions == "admin"){
    include("common/addProduct.php");
}



?>