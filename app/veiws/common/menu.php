<?php

use index as i;
$productsMenuController = $container["DbProductController"];


?>

<ul class="menu">

<li><a href="home.php">Home</a>
    <ul id="drpdn">
        <?php
        $categoryList = $productsMenuController->getAllCategories(3);
               
        foreach($categoryList as $x=>$menuCategory):
        ?>
        <li><a href=<?php echo "productlist.php?=category={$menuCategory->id}"?>><?php echo $menuCategory->name?></a></li>
        <?php endforeach;?>
    </ul>
</li>


<li><a href="err404.html">About</a></li>


<li><a href="err404.html">Associates</a></li>


<li><a href="contact.php">Contact</a></li>

</ul>