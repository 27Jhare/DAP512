<?php
namespace Controllers;
use Models;
use Tables as t;
Include("IUserController.php");
class UserController{

    public $_database;
        function __constructor($database){
            $_database = $databse;
        }

    public function AddUser($formreturn){
        $returnUser  = new User();
        if($formreturn["firstname"]== null || $formreturn[firstname] ==""){
            throw new argumentException("first name cannot be null or empty");
        }
        if($formreturn["lastname"] == null || $fromreturn["lastname"]==""){
            throw new argumentException();
        }
        
    }

      

}


?>