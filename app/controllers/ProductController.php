<?php
namespace Controllers;
use Models ;



class ProductController implements IProductController{

    private Idatabase $_database;
    function __constructor($database){
            $_database = $databse;
    }

    function getAllCategories(){
        $result = $database->getAllCategories();

    }
}

?>