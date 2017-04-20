<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/categories/new" method="post" class="form">

    <div class="form-group">
        <label for="name">Category:</label>
        <input type="text" name="name" id="name" class="form-control" ?>
    </div>

       

    <div class="form-group">
        <button type="submit" class="btn btn-success">Add</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
