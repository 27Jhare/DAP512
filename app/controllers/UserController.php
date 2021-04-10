<?php
namespace Controllers;
use Models;
use Tables as t;
Include("IUserController.php");
class UserController implements IUserController{

    private Models\Idatabase $_database;
        function __construct($database){
            $this->_database = $database;
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

    public function LoginUser($formarray){

        $returnedusers = $this->_database->verifyUserNamePassword($formarray["username"],$formarray["password"]);
        if(count($returnedusers)==1){
           $user= $returnedusers[0];
           $user->password = "";
            return $user;
        }
        return null;
       }

      

}


?>