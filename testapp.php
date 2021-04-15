<?php
use Tables as T;
use Models as M;
use Controllers as C;

//include("app\Models\Category.php");
include("app\Models\Database.php");
include("app\controllers\ProductController.php");
$DbConnection = new PDO("mysql:host=localhost:3306; dbname=uniassignment", "root");
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
$username= "Admin";
$password= "1";
$query="SHOW COLUMNS FROM `user` LIKE 'title'";
$stmt = $DbConnection->prepare($query);
$stmt->execute();
$returned= $stmt->fetchAll();
$type = $returned[0]["Type"];
preg_match('/enum\((.*)\)$/', $type, $matches);
$vals = explode(',', $matches[1]);
        echo "<pre>";
        print_r($vals);
        echo"</pre>";
echo gettype($type);

$controller = new  C\ProductController($db);

$top = $controller->getAllCategories(2);


echo "<pre>";
print_r($top);
echo"</pre>";

$categoryid = 3;
$product =new T\Product();
$product->name ="stringtest";
$product->price = "1233";
$product->description = "stringtest.txt";
$product->image = "stringtest.png";
function getArrayForPdoBind($object)
{
    //adapted from https://stackoverflow.com/questions/9144302/php-pdo-insert-method/9144404
    $objvars =get_object_vars($object);
    foreach ($objvars as $field => $v) {
        $ins[$v] = ':' . $field;
    };
    return $ins;
}

    $valuesarr = getArrayForPdoBind($product);
    $values = implode(',', $valuesarr);
    $fields = implode(',', array_keys(get_object_vars($product)));
    $DbConnection->beginTransaction();
    $productQuery = "INSERT INTO `product` ($fields)  VALUES ($values);";
    $categoryQuery = "INSERT INTO producttotype(`productid`, `typeid`) 
        SELECT product.id, producttypes.id FROM `product`, `producttypes` 
        WHERE product.name = :prodname AND producttypes.id = :catid";
    echo $productQuery;
    echo "<br>";
    echo $categoryQuery;
    $productstmt = $DbConnection->prepare($productQuery);
    $linkstmt = $DbConnection->prepare($categoryQuery);
    foreach ($valuesarr as $value => $feild) {
        $productstmt->bindValue($feild, $value);
    }
    $linkstmt->bindValue(":prodname", $product->name);
    $linkstmt->bindValue(":catid", $categoryid);
    $productstmt->execute();
    if ($productstmt->rowCount()==0) {
        $DbConnection->rollBack();
        echo "<br>err<br>";
    };
    $linkstmt->execute();
    if ($linkstmt->rowCount()==0) {
        $DbConnection->rollBack();
        echo "<br>err<br>";
    }

    $DbConnection->commit();
    


echo "<pre>";
print_r($returned);
echo"</pre>";
