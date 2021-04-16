<?php
namespace Controllers;

interface IUserController{
    function LoginUser($fromarray);
    function AddUser($formreturn);
    function GetTitles();
    function getUserFromCookie($id);
}

?>