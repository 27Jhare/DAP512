<?php
//namespace Models;
interface Idatabase{
    function Addproduct(product $product);
    function getItemsInCategory();
    function getAllCategories();
    function getProductReviews($product);
    function createNewOrder();
    function CreateUser($user);
    function UpdateOrderStatus();
    function AddItemToOrder($product, $quantity);
    function RemoveItemFromOrder($product,$quantity);
    function AddAddressToOrder();
}


?>