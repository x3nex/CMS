<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/categories" method="post" class="form">
    
    <input type="hidden" name="id" value="<?= $category->id ?>">
    <div class="form-group">
        <label for="username">Category name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $category->name; ?>">
    </div>
    

    
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
