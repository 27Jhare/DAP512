<?php
use  Controllers as c;
use index as i;
use Models as m;
use Tables as t;

include("../../index.php");
$usersController = $container["DbUserController"];
$productsController = $container["DbProductController"];
$cookiename="user";
if (!isset($_COOKIE[$cookiename])) {
    header("location: Login.php");
}
  if (!isset($_POST)) {
      header("location: authentication.php");
  }
   $formoutput = $_POST;
   $filename = "{$formoutput['name']}";
   //from https://www.w3schools.com/php/php_file_create.asp
   $err= array();

   $image= $_FILES["image"] ;
   if ($image["type"]!="image/jpeg" || $image["type"] != "image/png") {
       $err['filetype'] = "filetype is not png or jpg";
   }
   $object = new T\product();
   foreach ($formoutput as $key => $value) {
       $object->$key = strval($value);
   }
   
   $object->description=$filename.".txt";
   $object->image=$image["name"];
   $returned = $productsController->addProduct($object, $formoutput["category"]);
   if ($returned != "error link" || $returned != "error prod") {
       $productsController->saveDescriptionFile($object->description, $formoutput["description"], "products");
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" CONTENT="Page not found">
    <title>Add product <?php echo $object->name?>| testco Ltd</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b12863e982.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php include "common/header.php"?>
        <section class="flextainer">
            <aside>
                <?php include "common/menu.php"?>
            </aside>
            <section class="mainsection">
                <div class="maingrid">
                    <?php if ($returned == "error link" || $returned == "error prod"):?>
                    <h2>new product could not be added</h2>
                    
                    <?php else:
                       
                        $product = $object;
                        include("common/productpagecontent.php");
                    endif;
                    ?>
                    <h2><a class=".right" href="authentication.php">Return to admin page</a></h2>";

                </div>
            </section>
        </section>
        <footer>
            <a href="https://www.facebook.com/testcoTemperatureSensors/"><i class="fa fa-facebook-official"
                    aria-label="Facebook Page"></i></a>
            <a href="tel:+441903714140"><i class="fa fa-phone-square" aria-label="Phone Number"></i></a>
            <a href="mailto:sales@testco.co.uk?subject=Web enquiry"><i class="fa fa-paper-plane"
                    aria-label="Email Address"></i></a>
            <p>Registration Number: 866056 • VAT Registration Number: 193-2523-63<br>Student No: 19062354</p>
        </footer>
    </div>
</body>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&display=swap" rel="stylesheet">

</html>