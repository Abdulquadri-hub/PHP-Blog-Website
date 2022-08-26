<?php include("../path.php"); ?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/categories.php'); 
adminOnly();
?>


<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">

    <h5>Categories</h5>

    <!-- messages -->
    <?php include(ROOT_PATH.'/app/includes/messages.php'); ?>

    <div class="card-group justify-content-center">
    <table class="table table-striped table-hover">
        <tr><th>Category Name</th><th>Created by</th><th>Date</th>
        <th>
            <a href="<?=BASE_URL.'/categories/add.php'?>">
                <button class="btn btn-sm btn-primary float-end">
                    <i class="fa fa-plus"></i>
                    Add New
                </button>
            </a>
        </th></tr>

        <?php if($categories): ?>
    <?php foreach($categories as $category ): ?>
        <tr>
            <td><?=$category['category_name']?></td><td><?=$category['category_created_by']?></td><td><?=date($category['category_date'])?></td>
        <td>

        <a href="edit.php?category_update_id=<?=$category['id']?>"> 
            <button class="btn btn-sm btn-info text-white">Edit</button>
        </a>

        <a href="category.php?category_delete_id=<?=$category['id']?>">
            <button class="btn btn-sm btn-danger" name="delete_category">Delete</button>
        </a>
        </td>
    </tr>
    <?php endforeach;?>
    <?php else: ?>
        <h5>No Category found!</h5>
    <?php endif;?>
        </table>
    </div>
    </div>

<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>