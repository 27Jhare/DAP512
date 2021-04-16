<?php
 namespace Models;
interface Idatabase{
    function getProducts(int $catId);
    function getAllCategories();
    function getTopCategories($limit);
    function getProductReviews($product);
    function createNewOrder();
    function CreateUser($user);
    function UpdateOrderStatus();
    function AddItemToOrder($product, $quantity);
    function RemoveItemFromOrder($product,$quantity);
    function AddAddressToOrder();
    function getCategory($id,$name);
    function getProduct($id);
    function verifyUserNamePassword($username,$password);
    function getTitleEnum();
    function addProduct($product, $categoryid);
    function getUserfromCookie($id);
}


?>