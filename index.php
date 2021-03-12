<?php
namespace index;
use Controllers as c;
use Models as m;
//create a dummy DI container

$container = [];
$container["Database"] = new m\Databse();
$container["DbController"] = new c\UserController($container["Database"]);

 






?>