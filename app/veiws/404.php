<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" CONTENT="Page not found">

    <title>Error 404 | testco Ltd</title>

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b12863e982.js" crossorigin="anonymous"></script>

</head>
<?php
use  Controllers as c;
use index as i;
use Models as m;
use Tables as t;
include("../../indextest.php");
$usersController = $container["DbUserController"];
$productsController = $container["DbProductController"];
?>

<body>
    <div class="container">
        <?php include "common/header.php"?>

        <section class="flextainer">
            <aside>
                <?php include "common/menu.php"?>
            </aside>
            <section id="err404">
                <h2> ERROR 404</h2>
                <p>This site is only for display purposes. This page does not exist.<br>Either use the back button on
                    your browser or click the logo to return to the home page.<br><br>If you find yourself landing on
                    this page frequently please press the mute button when hovering over the video.</p>
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