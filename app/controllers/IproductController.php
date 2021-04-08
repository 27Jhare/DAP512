<?php
namespace Controllers;
use Tables as t;
interface IProductController{
    
    function getAllCategories(?int $limit=0);
    function getAllProductsInCategory($catId);
    function getCategoryById($id);
    function readDescription($category);
    function getProductById($id);
}

?>