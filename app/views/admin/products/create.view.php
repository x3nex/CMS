<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/products/new" method="post" class="form">

    <div class="form-group">
        <label for="name">Product name:</label>
        <input type="text" name="name" id="name" class="form-control" ?>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" class="form-control" ?>
    </div>

     <?php require 'app/views/partials/categoryList.view.php'; ?>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Add</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
