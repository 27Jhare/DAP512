<?php
namespace index;
use \Controllers;
use \Models;
//create a dummy DI container
include("app\Models\Database.php");
include("app\controllers\ProductController.php");
include("app\controllers\UserController.php");
$container = [];
$container["Database"] = new Models\Database();
$container["DbUserController"] = new Controllers\UserController($container["Database"]);
$container["DbProductController"] = new Controllers\ProductController($container["Database"])


?>





