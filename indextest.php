<?php
namespace index;
use \Controllers;
use \Models;
//create a dummy DI container

$container = [];
$container["Database"] = new Models\Database();
$container["DbUserController"] = new Controllers\UserController($container["Database"]);
$container["DbProductController"] = new Controllers\ProductController($container["Database"])

?>






?>