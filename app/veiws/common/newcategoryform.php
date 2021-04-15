<div class="adminform">
    <h2>new category</h2>
    <form method="post" name="category" action="newcategory.php">
        <label for="fullname">Category Name:</label>
        <input autofocus id="fullname" type="text" name="name" />
        <label for="descripiton"> description:</label>
        <textarea class="description" id="description" name="description"
            placeholder="Add product Description here"></textarea>
            <Label for= "catimage"> image:</Label>
        <input type="file" name="image" id="catimage" accept=".png,.jpg">
        <input type="submit" />
    </form>
</div>