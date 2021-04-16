<!DOCTYPE html>
<html lang="en">
<?php
$cookiename="user";
include("../../index.php");

if (isset($_COOKIE[$cookiename])) {
    header("location: authentication.php");
}
  
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description"
        CONTENT="Tel: +44 (0) 1903 714140, Email: sales@testco.co.uk, Rope Walk, Littlehampton, West Sussex, BN17 5DE. ">

    <title>Contact | testco Ltd</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php include("common/header.php")?>
        <section class="flextainer">
            <aside>
                <?php include("common/menu.php")?>
            </aside>


            <section class="mainsection">
                <div id="contactgrid">
                    <div class="contactform">
                        <form method="post" Action="authentication.php">
                            <input type="text" id="login" name="username" placeholder="User Name">
                            <input type="password" id="password" name="password" placeholder="Password">
                            <input type="submit" value="Log In">
                        </form>
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