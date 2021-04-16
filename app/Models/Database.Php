<?php
namespace Models;

use Tables as T;
use \PDO;

include("Idatabase.php");
include("Category.php");
include("Product.php");
include("User.php");

class Database implements Idatabase
{
    private PDO $DbConnection;

    public function __construct()
    {
        $this->DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment", "root");
    }
    public function SetPdo()
    {
        $this->DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment", "root");
    }
    public function addProduct($product, $categoryid)
    {
        
        echo "<pre>";
        print_r($product);
        echo"</pre>";
        try {
            $valuesarr = $this->getArrayForPdoBind($product);
            $values = implode(',', $valuesarr);
            $fields = implode(',', array_keys(get_object_vars($product)));
            

            $this->DbConnection->beginTransaction();
            $productQuery = "INSERT INTO `product` ($fields)  VALUES ($values);";
            $categoryQuery = "INSERT INTO producttotype(`productid`, `typeid`) 
                SELECT product.id, producttypes.id FROM `product`, `producttypes` 
                WHERE product.name = :prodname AND producttypes.id = :catid";
          
            $productstmt = $this->DbConnection->prepare($productQuery);
            $linkstmt = $this->DbConnection->prepare($categoryQuery);
            foreach ($valuesarr as $value => $feild) {
                $productstmt->bindValue($feild, $value);
            }
            $linkstmt->bindValue(":prodname", $product->name);
            $linkstmt->bindValue(":catid", $categoryid);
            $productstmt->execute();
            if ($productstmt->rowCount()==0) {
                $this->DbConnection->rollBack();
                return "error prod";
            };
            $linkstmt->execute();
            if ($linkstmt->rowCount()==0) {
                $this->DbConnection->rollBack();
                return "error link";
            }

            $this->DbConnection->commit();
            return $linkstmt->RowCount();
        } catch (Exception $e) {
            $this->DbConnection->rollBack();
            return $e;
        }
    }
    private function getArrayForPdoBind($object)
    {
        //adapted from https://stackoverflow.com/questions/9144302/php-pdo-insert-method/9144404
        $objvars =get_object_vars($object);
        foreach ($objvars as $field => $v) {
            $ins[$v] = ':' . $field;
        }
        return $ins;
    }

    //get products by category
    public function getProducts($catId)
    {
        try {
            $this->DbConnection->beginTransaction();
            $query = "select product.id,product.name,product.description, product.image,
        product.price from product, producttotype, producttypes where producttotype.typeid = :catid 
        AND producttotype.productid =product.id And producttypes.id = producttotype.typeid";
            $stmt = $this->DbConnection->prepare($query);
            $stmt->bindValue(":catid", $catId);
            $stmt->execute();
            if ($stmt->rowCount()==0) {
                $this->DbConnection->rollBack();
                return "roll back";
            }
            $this->DbConnection->commit();
            $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);
            return $returned;
        } catch (Exception $e) {
            $this->DbConnection->rollBack();
            return $e;
        }
    }



    public function getAllCategories()
    {
        $this->DbConnection->beginTransaction();
        $query = "SELECT * FROM producttypes";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return "roll back";
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
    
        return $returned;
    }
    
    public function getCategory($id=-1, $name="")
    {
        $this->DbConnection->beginTransaction();
        $query = "select * from producttypes where id=:id or name=:name limit 1";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->bindValue(":name", $name);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return "roll back";
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
        return $returned;
    }

    public function getProduct($id)
    {
        $this->DbConnection->beginTransaction();
        $query="select * from product where id=:id limit 1";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return array("roll back");
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);
        return $returned;
    }
    public function verifyUserNamePassword($username, $password)
    {
        $this->DbConnection->beginTransaction();
        $query="SELECT * FROM user WHERE firstname = :username AND password = :userpassword";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->bindValue(":username",$username);
        $stmt->bindValue(":userpassword", $password);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return array();
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\User::class);
        return $returned;
    }
    public function getUserfromCookie($id){
        $this->DbConnection->beginTransaction();
        $query="SELECT * FROM user WHERE id = :id";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return array();
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\User::class);
        return $returned;
    }

    public function getTopCategories($limit)
    {

        //should be a query that look at number of orders
        $this->DbConnection->beginTransaction();
        $query = "select * from producttypes producttotype where  limit :limitval";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->bindValue(':limitval', ($limit), PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return "roll back";
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);#
        
        return $returned;
    }

    //get values of titles enum in db
    public function getTitleEnum()
    {
        //adapted from https://stackoverflow.com/questions/2350052/how-can-i-get-enum-possible-values-in-a-mysql-database
        $this->DbConnection->beginTransaction();
        $query="SHOW COLUMNS FROM `user` LIKE 'title'";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount()==0) {
            $this->DbConnection->rollBack();
            return "roll back";
        }
        $this->DbConnection->commit();
        $returned= $stmt->fetchAll();
        return $returned;
    }



    public function getProductReviews($product)
    {
    }
    public function createNewOrder()
    {
    }
    public function CreateUser($user)
    {
    }
    public function UpdateOrderStatus()
    {
    }
    public function AddItemToOrder($product, $quantity)
    {
    }
    public function RemoveItemFromOrder($product, $quantity)
    {
    }
    public function AddAddressToOrder()
    {
    }
}