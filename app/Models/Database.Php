<?php
namespace Models;
use Tables as T;
use \PDO;
include("Idatabase.php");
include("Category.php");
include("Product.php");

class Database implements Idatabase{
    private PDO $DbConnection;

    function __construct(){
        $this->DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment","root");
    }
    public function SetPdo(){
        $this->DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment","root");
    }
    public function Addproduct(product $product){

        $query = "insert {$product->name},";
    }


    //get products by category
    function getProducts($catId){
        $query = "select product.id,product.name,product.description, product.image, product.price from product, producttotype, producttypes where producttotype.typeid = $catId 
        AND producttotype.productid =product.id And producttypes.id = producttotype.typeid";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();       
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);            
        return $returned;
    }



    function getAllCategories(){ 
        $query = "select * from producttypes limit 8";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();       
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);     
    
        
        return $returned;
    }
    
    function getCategory($id=-1,$name="''"){
        //check query with one at work.
        $query = "select * from producttypes where id=$id or name = $name limit 1";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();       
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
        return $returned;

    }


    function getProductReviews($product){}
    function createNewOrder(){}
    function CreateUser($user){}
    function UpdateOrderStatus(){}
    function AddItemToOrder($product, $quantity){}
    function RemoveItemFromOrder($product,$quantity){}
    function AddAddressToOrder(){}
}


?>