<?php





?>

<ul class="menu">

<li><a href="index.html">Home</a>
    <ul id="drpdn">
        <?php
        $categoryList = $productsController->getAllCategories(6);
        foreach($categoryList as $x=>$menuCategory):
        ?>
        <li><a href=<?php echo "productlist.php?=category={$category->id}"?>><?php echo $category->name?></a></li>
        <?php endforeach;?>
    </ul>
</li>


<li><a href="err404.html">About</a></li>


<li><a href="err404.html">Associates</a></li>


<li><a href="contact.php">Contact</a></li>

</ul>