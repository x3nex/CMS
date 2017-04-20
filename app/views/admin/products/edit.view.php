<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/products" method="post" class="form">
    
    <input type="hidden" name="id" value="<?= $product->id ?>">
    <div class="form-group">
        <label for="username">Product name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $product->name; ?>">
    </div>
    
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" class="form-control" value="<?= $product->price; ?>">
    </div>


    <?php require 'app/views/partials/categoryList.view.php'; ?>

    
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
