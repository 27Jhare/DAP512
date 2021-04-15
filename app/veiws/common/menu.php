<?php

use index as i;
$productsMenuController = $container["DbProductController"];


?>

<ul class="menu">

<li><a href="index.php">Home</a>
    <ul id="drpdn">
        <?php
        $categoryList = $productsMenuController->getAllCategories(3);      
        foreach($categoryList as $x=>$menuCategory):
        ?>
        <li><a href=<?php echo "productlist.php?=category={$menuCategory->id}"?>><?php echo $menuCategory->name?></a></li>
        <?php endforeach;?>
    </ul>
</li>


<li><a href="About.php">About</a></li>


<li><a href="assosiates.php">Associates</a></li>


<li><a href="contact.php">Contact</a></li>

</ul>