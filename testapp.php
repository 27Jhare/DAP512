<?php
use Tables as T;
use Models as M;
use Controllers as C;
//include("app\Models\Category.php");
include("app\Models\Database.php");
include("app\controllers\ProductController.php");
//$DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment","root");
// $catId=7;
// $query = "select product.id, product.name, product.price 
// from product, producttotype, producttypes where producttotype.typeid = 7 AND producttotype.productid =product.id";
// echo $query;
// $stmt = $DbConnection->prepare($query);
// $stmt->execute();
// echo "<br>";
// echo "<pre>";
// print_r($stmt);
// echo"</pre>";

// $returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Product::class);
//$returned= $stmt->fetchAll();
//$returned= $productsController->getAllCategories();
// echo(is_array($returned));
// foreach ($returned as $x => $category){

// echo "<pre>";
// print_r($category);
// echo"</pre>";
// echo "<br>";


// }



 $db = new M\Database();

$returned = $db->verifyUserNamePassword("Admin", "1");
echo "<pre>";   
print_r($returned);
echo"</pre>";
$limit=6;
$query = "select * from producttypes limit $limit";
$stmt = $DbConnection->prepare($query);
$stmt->execute();       
$returned= $stmt->fetchAll(PDO::FETCH_CLASS, T\Category::class);           

        
        echo "<pre>";
        print_r($returned);
        echo"</pre>";
echo gettype("string");

$controller = new  C\ProductController($db);

$top = $controller->getAllCategories(2);


echo "<pre>";
print_r($top);
echo"</pre>";


?>