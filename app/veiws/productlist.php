<!DOCTYPE html>
<html lang="en">
<?php
use index as I;
use Models as M;
use Tables as T;

include("../../indextest.php");
$productsController = $container["DbProductController"];
$Get = $_GET;
$categoryId=$Get["category"];
$category = $productsController->getCategoryById($categoryId);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description"
        CONTENT=<?php echo "{$category->name}: {$productsController->readDescription($category)}"  ?>>

    <title><?php echo "{$category->name} | testco Ltd"?></title>

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b12863e982.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <?php include "common/header.php"?>

        <section class="flextainer">
            <aside>
                <?php include("common/menu.php") ?>
            </aside>
            <section class="mainsection">
                <div class="maingrid">
                    <?php
                    $products = $productsController->getAllProductsInCategory($categoryId);
                    
                    echo "<pre>";
                    print_r($products);
                    echo"</pre>";
                    foreach ($products as $x => $product):
                        $newId =strval($product->id);
                    ?>
                    <?php echo "<a href=productPage.php?id=$newId class='buttimg'>";?>
                    <img src="../sensors/air.jpg" alt=<?php echo $product->name?>>

                    <p><?php echo "$product->name £{$product->price}";?>
                    </p>
                    <div class="description">
                        <?php
                        
                        echo substr($productsController->readDescription($product), 0, 50);
                        echo "...";
                        
                        
                        ?>

                    </div>
                    </a>
                    <?php endforeach ?>

                    <!-- <a href="err404.php" class="buttimg">
                        <img src="sensors/bayonet.jpg" alt="Bayonet sensor">
                        <p>Bayonet</p>
                    </a>
                    <a href="err404.php" class="buttimg">
                        <img src="sensors/air.jpg" alt="Plastics sensor">
                        <p>Plastics</p>
                    </a>
                    <a href="err404.php" class="buttimg">
                        <img src="sensors/bayonet.jpg" alt="Tubular sensor">
                        <p>Tubular</p>
                    </a>
                    <a href="err404.php" class="buttimg">
                        <img src="sensors/air.jpg" alt="Hand Held sensor">
                        <p>Hand Held</p>
                    </a>
                    <a href="err404.php" class="buttimg">
                        <img src="sensors/bayonet.jpg" alt="Air sensor">
                        <p>Air</p>
                    </a> -->
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