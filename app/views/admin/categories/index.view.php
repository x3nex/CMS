<?php require 'app/views/partials/header.php'; ?>

<div class="row">
    <div class="col-md-12 text-right padding-30">
        <a href="/admin/categories/new"  class="btn btn-primary">Add new <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
    </div>
</div>
<table class="table table-responsive table-hover table-bordered">
    <tr>
        <th>ID</th>
        <th>Category</th>
        
        <th class="text-center">Actions</th>
    </tr>
    <?php $count = 1;  ?>


    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $count++; ?> </td>
            
           
            <td><?= ucfirst($category->name) ?></td>

            
            <td class="text-center">
                <a href="/admin/categories/edit?id=<?= $category->id ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                                          -
                <a href="/admin/categories/delete?id=<?= $category->id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php require 'app/views/partials/footer.php'; ?>


