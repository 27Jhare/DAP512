<?php
namespace Controllers;
use models;
use tables as t;

class UserController{

    public $_database;
        function __constructor(models\Idatabase $database){
            $_database = $databse;
        }

    public function AddUser($formreturn){
        $returnUser  = new t\User();
        if($formreturn["firstname"]== null || $formreturn[firstname] ==""){
            throw new argumentException("{$FirstName} cannot be null or empty");
        }
        
        
    }
}


?>