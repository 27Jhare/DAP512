<?php
namespace models;
use tabels as t;

class Database implements Idatabase{
    private PDO $DbConnection;

    function __constructor(){
        
        
        $DbConnection = new PDO("mysql:host=localhost:3306; dbname=TestCo","root"); 
    }

    public function Addproduct(t\product $product){

        $query = "insert {$product->name},";
    }

    public function CreateUser(t\User $user){

        $query = "insert into user (firstname, lastname, dob,pasword,gender, title)
         values ({$user->FirstName},{$user->LastName},{$user->dateOfBirth},{$user->password},{$user->gender}
         ,{$user->title})";
    }

}

?>