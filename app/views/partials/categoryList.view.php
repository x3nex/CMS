<div class="form-group">
        <label for="category_id">Category:</label>
        <br>
        <?php foreach($categories as $catID=>$catName): ?>
        <input 
            type="radio" 
            name="category_id" 
            id="category_id" 
            value="<?php echo $catID ?>"
            <?php if(isset($product) && $product->category_id == $catID){ 
            echo " checked"; 
            } ?> 
        > <?php echo $catName; ?><br>
        <?php endforeach; ?>
        
       
    </div>
