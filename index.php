<?php
namespace index;

use \Controllers;
use \Models;

//create a dummy DI container
include("app\Models\Database.php");
include("app\controllers\ProductController.php");
include("app\controllers\UserController.php");
$container = [];
$Database = new Models\Database();
$DbUserController = new Controllers\UserController($Database);
$DbProductController= new Controllers\ProductController($Database);
$container["Database"] = $Database;
$container["DbUserController"] = $DbUserController;
$container["DbProductController"] = $DbProductController;




?>

