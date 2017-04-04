<?php require 'app/views/partials/header.php'; ?>
<form action="/admin/users" method="post" class="form">
    
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <div class="form-group">
        <label for="username">User:</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $user->username; ?>">
    </div>
    
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" value="" placeholder="enter new pass">
    </div>



    <div class="form-group">
        <label for="role">Admin:</label>
        
        <input type="checkbox" name="role" id="role" value="1" <?= $user->role ? "checked" : ""; ?>>
        

       
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

</form>
<?php require 'app/views/partials/footer.php'; ?>
