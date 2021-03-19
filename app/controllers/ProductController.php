<?php
namespace Controllers;
use Models ;
include("IProductController.php");


class ProductController implements IProductController{

    private Idatabase $_database;
    function __constructor($database){
            $_database = $databse;
    }

    function getAllCategories(){
        

    }
}

?>