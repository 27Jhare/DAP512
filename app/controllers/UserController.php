<?php
namespace Controllers;

use Models;
use Tables as t;

include("IUserController.php");
class UserController implements IUserController
{
    private Models\Idatabase $_database;
    public function __construct($database)
    {
        $this->_database = $database;
    }

    public function AddUser($formreturn)
    {
        $returnUser  = new User();
        if ($formreturn["firstname"]== null || $formreturn[firstname] =="") {
            throw new argumentException("first name cannot be null or empty");
        }
        if ($formreturn["lastname"] == null || $fromreturn["lastname"]=="") {
            throw new argumentException();
        }
    }

    public function LoginUser($formarray)
    {
        $returnedusers = $this->_database->verifyUserNamePassword($formarray["username"], $formarray["password"]);
        if (count($returnedusers)==1) {
            $user= $returnedusers[0];
            $user->password = "";
            return $user;
        }
        return null;
    }
    public function getUserFromCookie($id)
    {
        $returnedusers=  $this->_database->getUserfromCookie($id);
        if (count($returnedusers)==1) {
            $user= $returnedusers[0];
            $user->password = "";
            return $user;
        }
        return null;
    }
    
    public function GetTitles()
    {
        //adapted from https://stackoverflow.com/questions/2350052/how-can-i-get-enum-possible-values-in-a-mysql-database
        $returned = $this->_database->getTitleEnum();
        $type = $returned[0]["Type"];
        preg_match('/enum\((.*)\)$/', $type, $matches);
        $vals = explode(',', $matches[1]);
        return $vals;
    }
}
