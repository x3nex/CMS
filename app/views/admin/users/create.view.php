<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/users/new" method="post" class="form">

    <div class="form-group">
        <label for="username">User:</label>
        <input type="text" name="username" id="username" class="form-control" ?>
    </div>

    <div class="form-group">
        <label for="username">Password:</label>
        <input type="number" name="password" id="password" class="form-control" ?>
    </div>

    <div class="form-group">
        <label for="role">Admin:</label>
        
        <input type="checkbox" name="role" id="role" value="1" >
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
