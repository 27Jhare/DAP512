<?php echo "<a href=../sensors/air.jpg class='buttimg'>";?>
<img src="../sensors/air.jpg" alt=<?php echo $product->name?> />

<p><?php echo "$product->name £{$product->price}";?></p>
</a>
<div class="fulldescription">
    <?php echo $productsController->readDescription($product); ?>
</div>