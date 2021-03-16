<?php
namespace Controllers;
use Tables as t;
interface IProductController{
    function addProduct($product);
    function getAllCategories();
}

?>