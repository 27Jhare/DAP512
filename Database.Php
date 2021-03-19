<?php
//namespace Models;
include("Idatabase.php");

class Database implements Idatabase{
    private PDO $DbConnection;

    function __constructor(){
        
        
        $DbConnection = new PDO("mysql:host=localhost:3306; dbname=TestCo","root"); 
    }

    public function Addproduct(product $product){

        $query = "insert {$product->name},";
    }

    function getItemsInCategory(){}
    function getAllCategories(){}
    function getProductReviews($product){}
    function createNewOrder(){}
    function CreateUser($user){}
    function UpdateOrderStatus(){}
    function AddItemToOrder($product, $quantity){}
    function RemoveItemFromOrder($product,$quantity){}
    function AddAddressToOrder(){}
}

?>