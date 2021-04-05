<?php
namespace Tables;
class User {

    public string $FirstName;
    public  string $LastName;
    public int $Id;
    //should be enum
    public int $gender;
    public string $password;
    public date $DateOfBirth;
    public $title;
    public $permissions;

}


?>