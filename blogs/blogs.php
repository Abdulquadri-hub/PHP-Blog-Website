<?php include("../path.php"); ?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/posts.php'); 
adminOnly();
?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php ?>

    <h5>Blogs</h5>

        <!-- messages -->
        <?php include(ROOT_PATH.'/app/includes/messages.php'); ?>

    <div class="card-group justify-content-center">

    
    <table class="table table-striped table-hover">
        <tr><th></th><th>blog Name</th><th>Created by</th><th>Date</th>
        <th>
            <a href="<?=BASE_URL.'/blogs/add'?>">
                <button class="btn btn-sm btn-primary float-end">
                    <i class="fa fa-plus"></i>
                    Add New
                </button>
            </a>
        </th>
    </tr>

        <?php if($posts): ?>
    <?php foreach($posts as $post ): ?>

        <tr>
            <td>
            <a href="<?= BASE_URL."/homepage/single-post?title=".$post['post_slug'];?>"> 
                <button class="btn btn-sm btn-primary">View</button>
            </a>
        </td>

            <td><?=$post['post_title']?></td><td><?=$post['post_created_by']?></td><td><?=date($post['post_created_at'])?></td>
        
        <td>
        <a href="edit?post_update_id=<?=$post['id']?>"> 
            <button class="btn btn-sm btn-outline-info">Edit</button>
        </a>

        <a href="blogs?post_delete_id=<?=$post['id']?>">
            <button class="btn btn-sm btn-outline-danger ">Delete</button>
        </a>

        <?php if($post['post_published']):?>
        <a href="blogs?published=0&p_id=<?=$post['id']?>">
            <button class="btn btn-sm btn-outline-success ">Unpublish</button>
        </a>
        <?php else:?>
            <a href="blogs?published=1&p_id=<?=$post['id']?>">
            <button class="btn btn-sm btn-outline-info ">Publish</button>
        </a>
        <?php endif;?>

        </td>
    </tr>
    <?php endforeach; ?>
    <?php else:?>
        <h4>No Blogs found at this time</h4>
        <?php endif;?>
        </table>
    </div>


    </div>

<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>