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
        try {
            $valuesarr = $this->getArrayForPdoBind($product);
            $values = implode(',', $valuesarr);
            $fields = implode(',', array_keys(get_object_vars($product)));
            
            echo "<pre>";
            print_r($valuesarr);
            echo"</pre>";
            $this->DbConnection->beginTransaction();
            $productQuery = "INSERT INTO `product` ($fields)  VALUES ($values);";
            $categoryQuery = "INSERT INTO producttotype(`productid`, `typeid`) 
        SELECT product.id, producttypes.id FROM `product`, `producttypes` 
        WHERE product.name = :prodname AND producttypes.id = :catid";
            echo $productQuery;
            echo "<br>";
            echo $categoryQuery;
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
                return $productstmt;
            };
            $linkstmt->execute();
            if ($linkstmt->rowCount()==0) {
                $this->DbConnection->rollBack();
                return $linkstmt;
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
        $query = "select product.id,product.name,product.description, product.image,
        product.price from product, producttotype, producttypes where producttotype.typeid = :catid 
        AND producttotype.productid =product.id And producttypes.id = producttotype.typeid";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);
        return $returned;
    }



    public function getAllCategories()
    {
        $query = "select * from producttypes";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
    
        
        return $returned;
    }
    
    public function getCategory($id=-1, $name="''")
    {
        //check query with one at work.
        $query = "select * from producttypes where id=$id or name = $name limit 1";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
        return $returned;
    }

    public function getProduct($id)
    {
        $query="select * from product where id=$id limit 1";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);
        return $returned;
    }
    public function verifyUserNamePassword($username, $password)
    {
        $query="SELECT * FROM user WHERE firstname = '$username' AND password = '$password'";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\User::class);
        
        return $returned;
    }

    public function getTopCategories($limit)
    {

        //should be a query that look at number of orders
        $query = "select * from producttypes limit {$limit}";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);
        return $returned;
    }

    //get values of titles enum in db
    public function getTitleEnum()
    {
        //adapted from https://stackoverflow.com/questions/2350052/how-can-i-get-enum-possible-values-in-a-mysql-database
        $query="SHOW COLUMNS FROM `user` LIKE 'title'";
        $stmt = $this->DbConnection->prepare($query);
        $stmt->execute();
        $returned= $stmt->fetchAll();
        $type = $returned[0]["Type"];
        preg_match('/enum\((.*)\)$/', $type, $matches);
        $vals = explode(',', $matches[1]);
        
        return $vals;
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
