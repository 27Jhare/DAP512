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

<body>
    <div class="container">
    <?php include ("common/header.php")?>
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
                            media.</p>
                        <form method="post">
                            <p>
                                <label for="contactform"><br>Full Name:<input autofocus class="fullname" type="text"
                                        name="name" /></label>
                            </p>
                            <p>
                                <label for="contactform"> Email Address: <input class="emailaddress" type="email"
                                        name="email" /></label>
                            </p>
                            <p>
                                <label for="contactform"> Your Query:<textarea class="query" id="query" name="query"
                                        placeholder="Ask your question here..."></textarea></label>
                            </p>
                            <p>
                                <label for="contactform">
                                    <span>Query Type:</span>
                                    <input type="radio" name="queryType" value="purchase" />
                                    <span>Purchase</span>
                                    <input type="radio" name="queryType" value="techsupport" />
                                    <span>Technical Support<br></span>
                                    <input type="radio" name="queryType" value="generalquery" />
                                    <span>Website Improvement</span>
                                    <input type="radio" name="queryType" value="generalquery" />
                                    <span>General Query</span>
                                </label>
                            </p>
                            <p>
                                <label for="contactform">
                                    <span>By checking this box you agree to our <a href="#"
                                            target="_blank">T&Cs</a></span>
                                    <input type="checkbox" required name="tandc" />
                                </label>
                            </p>
                            <p>
                                <input type="submit" href="index.html" target="_self">
                            </p>
                        </form>
                    </div>
                    <div id="map">
                        <h2>Find us</h2>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10084.670741730217!2d-0.5508095!3d50.8095318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x890150fde0e3b603!2stestco%20Ltd!5e0!3m2!1sen!2suk!4v1594578043887!5m2!1sen!2suk"
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