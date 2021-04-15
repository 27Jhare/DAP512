<?php
namespace Controllers;

use Models ;

include("IProductController.php");


class ProductController implements IProductController
{
    private Models\Idatabase $_database;
    public function __construct($database)
    {
        $this->_database = $database;
    }

    public function getAllCategories(?int $limit=0)
    {
        if ($limit>0) {
            $result = $this->_database->getTopCategories($limit);
        } else {
            $result = $this->_database->getAllCategories();
        }
        return $result;
    }

    public function getAllProductsInCategory($catId)
    {
        return $this->_database->getProducts($catId);
    }

    public function getCategoryById($id)
    {
        return $this->_database->getCategory($id)[0];
    }

    public function getProductById($id)
    {
        return $this->_database->getProduct($id)[0];
    }

    public function readDescription($category)
    {
        if (gettype($category)!="string") {
            $categorystring = $category->description;
        } else {
            $categorystring =$category;
        }
        //temporary solution as file names arent set
        $categorystring = "description.txt";
        $filename = "../sensors/$categorystring";
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        $description = fread($myfile, filesize($filename));
        fclose($myfile);
        return $description;
    }

    public function saveDescriptionFile($filename, $description)
    {
        $myfile = fopen("..\..\assets\products\descriptions\{$filename}", "w") or die("Unable to create file!");
        $txt = $description;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    public function addProduct($product,$id){
        return $this->_database->addProduct($product,$id);
    }
}
