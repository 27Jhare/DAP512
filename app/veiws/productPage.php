<!DOCTYPE html>
<html lang="en">
<?php
use index as I;
use Models as M;
use Tables as T;
include("../../index.php");
$productsController = $container["DbProductController"];
$Get = $_GET;
$productId=$Get["id"];
$product = $productsController->getproductById($productId);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" CONTENT=<?php echo "{$product->name}: {$productsController->readDescription($product)}"  ?>>

    <title><?php echo "{$product->name} | testco Ltd"?></title>

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b12863e982.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
    <?php include("common/header.php")?>

        <section class="flextainer">
            <aside>
            <?php include("common/menu.php") ?>
            </aside>
            <section class="mainsection">
                <div class="maingrid">
  
                    <?php echo "<a href=../sensors/air.jpg class='buttimg'>";?> 
                        <img src="../sensors/air.jpg" alt=<?php echo $product->name?>/>
                        
                            <p><?php echo "$product->name £{$product->price}";?></p>
                    </a>
                        <div class="fulldescription">
                            <?php echo $productsController->readDescription($product); ?>
                        </div>
        
                </div>
            </section>
        </section>

        <footer>
            <a href="https://www.facebook.com/testcoTemperatureSensors/"><i class="fa fa-facebook-official"
                    aria-hidden="true"></i></a>
            <a href="tel:+441903714140"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
            <a href="mailto:sales@testco.co.uk?subject=Web enquiry"><i class="fa fa-paper-plane"
                    aria-hidden="true"></i></a>
            <p>Registration Number: 866056 • VAT Registration Number: 193-2523-63<br>Student No: 19062354</p>
        </footer>
    </div>
</body>

<link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&display=swap" rel="stylesheet">

</html>