<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description"
        CONTENT="Tel: +44 (0) 1903 714140, Email: sales@testco.co.uk, Rope Walk, Littlehampton, West Sussex, BN17 5DE. ">

    <title>Contact | testco Ltd</title>

    <link rel="stylesheet" href="style.css">
</head>
<?php
use  Controllers as c;
use index as i;
use Models as m;
use Tables as t;

include("../../index.php");
$usersController = $container["DbUserController"];
$productsController = $container["DbProductController"];?>

<body>
    <div class="container">
        <?php include("common/header.php")?>
        <section class="flextainer">
            <aside>
                <?php include("common/menu.php") ?>
            </aside>


            <section class="mainsection">
                <div id="contactgrid">
                    <div class="contactform">
                        <h2>Contact Us</h2>
                        <p>If you'd like to contact us please fill out the form below or use our details found above.
                            <br>Alternatively, you can share your experience or ask any question through our social
                            media.
                        </p>
                        <form method="post">

                            <label for="contactfullname"><br>Full Name:</label><input autofocus id="contactfullname"
                                type="text" name="name" />

                            <label for="contactEmail"> Email Address:</label> <input id="contactemail" type="email"
                                name="email" />


                            <label for="query"> Your Query:</label><textarea id="query" name="query"
                                placeholder="Ask your question here..."></textarea>




                            <label for="agree">
                                By checking this box you agree to our </label>
                            <a href="#" target="_blank">T&Cs</a>
                            <input type="checkbox" required name="tandc" id="agree/>
                                
                          
                                <input type=" submit" href="index.php" target="_self">

                        </form>
                    </div>
                    <div id="map">
                        <h2>Find us</h2>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3708.9997776796454!2d-0.6647500727635132!3d50.7872428032854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4875ac38fa141f35%3A0xf705e90032750154!2sUniversity%20of%20Chichester!5e0!3m2!1sen!2suk!4v1618488209457!5m2!1sen!2suk"
                            width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0" title="map"></iframe>
                    </div>
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