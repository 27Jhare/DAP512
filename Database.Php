<?php
namespace Models;


class Database implements Idatabase{
    private PDO $DbConnection;

    function __constructor(){
        
        
        $DbConnection = new PDO("mysql:host=localhost:3306; dbname=TestCo","root"); 
    }

    public function Addproduct(product $product){

        $query = "insert {$product->name},";
    }

}

?>