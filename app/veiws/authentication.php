<?php
namespace Controllers;
use Tables as T;
Use Models as M;
use index as i;
include("../../index.php");
// adapted From https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

// Initialize the session
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
    $_SESSION["user"]=null;
    $_SESSION["loggedIn"]= false; 
}


// echo "<pre>";
// print_r($_POST);
// echo"</pre>";

$usersController = $container["DbUserController"];
$authUser = $usersController->LoginUser($_POST);

// echo "<pre>";
// print_r($authUser);
// echo"</pre>";
if($authUser != null){

    $_SESSION["user"]=$authUser;
    $_SESSION["loggedIn"]= true;
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo"</pre>";
    
}

else{
    header("location: Login.php?er=true");
}

$productsController = $container["DbProductController"];
$userController = $container["DbUserController"];
$categories= $productsController->getAllCategories();
$titles = $userController->GetTitles();

?>
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
                    <?php
                    if($authUser->level == "Administrator"){
                        include("common/newproductform.php");
                        include("common/newcategoryform.php");
                    }?>
                
                        

                <div class="adminform">
                    <h2>update info</h2>
                    <form class="inputform" action="edituser.php" method="$post">
                    <label for="firstname">First Name :</label>
                    <input value=<?php echo $authUser->lastname?>
                     id="firstname" type="text" name="firstname" class="admininput"/>
                    <label for="lastname">Last Name :</label><input value=<?php echo $authUser->lastname?> id="lastname" type="text"
                                        name="lastname" class="admininput"  />
                    <Label  for="title">Title:</Label>
                    <select id= "title" name = "title" class="admininput">      
                    <?php  foreach($titles as $item){
                       $trimmed =trim($item, "'");
                    if($trimmed == $authUser->title){
                        echo"<option selected=$trimmed value= $trimmed>$trimmed</option>\n";
                    }
                    else{
                      echo "<option value= $trimmed>$trimmed</option>\n";
                    }
                    }?>
                    </select>
                    <input type="submit" class="adminsubmit">
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