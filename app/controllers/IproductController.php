<?php
namespace Controllers;
use Tables as t;
interface IProductController{
    
    function getAllCategories();
    function getAllProductsInCategory($catId);
    function getCategoryById($id);
    function readDescription($category);
}

?>