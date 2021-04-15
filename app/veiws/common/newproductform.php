<div class="adminform">
    <h2>new product</h2>
    <form method="post" name="newproduct" action="newproduct.php" enctype="multipart/form-data">
                            
        <label for="prodname">product Name :</label>
        <input autofocus id="prodname" type="text" name="name" />
        <label for="price">price :</label>
        <input id="price" type="number" min ="0.01" step="0.01" name="price" />
                            
        <label for="descripiton"> description:</label>
        <textarea class="descripiton" id="description" name="description"
        placeholder="Add product Description here"></textarea>
                            
        <Label for= "category"> Category:</Label>
        <select id="category" name ="category">      
            <?php  foreach($categories as $item){
                echo "<option value= $item->id>$item->name</option>\n";
            }?>
        </select>

        <Label for= "image"> image:</Label>
        <input type="file" name="image" id="prodImage" accept=".png,.jpg">
                                                           
        <input type="submit" href="index.html" target="_self">
                            
    </form>
</div>