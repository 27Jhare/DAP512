<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" CONTENT="Suppliers of quality temperature sensors and instrumentation">

    <title>testco Ltd | Temperature Sensors and Instrumentation</title>

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/b12863e982.js" crossorigin="anonymous"></script>

</head>
<?php
use  Controllers as c;
use index as i;
use Models as m;
use Tables as t;
$usersController = i::container["DbUserController"];
$productsController = i::container["DbProductController"];

$Categories= $productsController->getAllCategories();
?>
<body>
    <div class="container">
        <header>

            <h1 id="logo"><a href="index.html">testco Ltd</a></h1>

            <div id="contact">
                <p><a href="tel:+441903714140">Call: +44 (0) 1903 714140</a>
                    <br><a href="tel:+441903717435">Fax: +44 (0) 1903 717435</a>
                    <br><a href="mailto:sales@testco.co.uk?subject=Web enquiry">Email: sales@testco.co.uk</a></p>
            </div>
        </header>

        <section class="flextainer">
            <aside>
            <?php include "common/menu.php"?>
            </aside>
            <section class="mainsection">
                
                <div class="maingrid">
                    <?php foreach ($categoties as $category):?>
                    
                    <a href=<?php echo "{$category->name}.php" ?>>
                        <i class="fas fa-thermometer-quarter buttcon">
                            <p><?php echo $category->name?></p>
                        </i>
                    </a>
                    <?php endforeach;?>
                    <!-- <a href="err404.html">
                        <i class="fas fa-broadcast-tower buttcon">
                            <p>Thermowells, Fittings and Transmitters</p>
                        </i></a>
                    <a href="err404.html">
                        <i class="fas fa-plug buttcon">
                            <p>Cable</p>
                        </i></a>
                    <a href="err404.html">
                        <i class="fas fa-microscope buttcon">
                            <p>Instrumentation</p>
                        </i></a>
                    <a href="err404.html">
                        <i class="fab fa-usb buttcon">
                            <p>Connectors</p>
                        </i></a>
                    <a href="err404.html">
                        <i class="fas fa-info-circle buttcon">
                            <p>Info</p>
                        </i></a> -->
                </div>
                <div id="info">
                    <h2>Temperature Sensor and Temperature Instrumentation Manufacturer</h2>
                    <p>testco Ltd is a UK based temperature sensor manufacturer and temperature instrumentation
                        stockist with over 45 years' experience in supplying to the industry (initially plastics and
                        rubber moulding). testco Ltd also stocks analogue temperature, digital temperature and power
                        controllers.<br><br>

                        Our focus is on supplying high quality temperature sensors and temperature
                        Our focus is on supplying high quality temperature sensors and temperature
                        instrumentation products for the industrial market. Our current range of units includes
                        thermocouples, platinum resistance, PT100, PT1000, thermistors, thermopockets, thermowells,
                        transmitters, data loggers, compression fittings, bayonet adaptors, connectors, thermocouple
                        cable and chart recorders.<br></p>

                    <h2>Information about Temperature Sensors and Instrumentation:</h2>
                    <p>
                        Over the years we have seen many sensors being developed for measuring temperature. A common
                        piece of temperate instrumentation is a thermocouple, which is a device consisting of two
                        dissimilar conductors. Thermocouples are widely used as a type of temperature sensor for
                        measurement and control.<br><br>

                        Another popular measuring advice is a temperature data logger, which is a portable measurement
                        instrument. A data logger is capable of independently recording temperature over a defined
                        period of time. The data collected can then be viewed and evaluated after it has been recorded.
                    </p>
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