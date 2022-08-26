<?php include("../path.php"); ?>
<?php require(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/users.php'); 
adminOnly();
?>


<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">

            <!-- messages -->
            <?php include(ROOT_PATH.'/app/includes/messages.php'); ?>

<?php ?>
<!-- search -->
<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
    <div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
    </div>
    </form>

    <a href="<?=BASE_URL.'/users/add.php'?>">
            <button class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </a>
</nav>


    <div class="card-group justify-content-center">

    <?php if($admin_users): ?>  
    <?php foreach($admin_users as $admin_user):?>    

    <div class="card m-2 shadow" style="max-width: 14rem;min-width:14rem;">
    <div class="card-header">User Profile</div>
    <img src="<?=BASE_URL.'/asset/user.png'?>" alt="card-img-top" class="card-img-top" style=" ">
    <div class="card-body">
    <h5 class="card-title"><?=$admin_user['username']?></h5>
    <p class="card-text"><?=$admin_user['email']?></p>
    <a href="<?=BASE_URL.'/profile.php?adminuser='.$admin_user['username']?>" class="btn btn-primary">Profile</a>
    <a href="edit?user_update_id=<?=$admin_user['id']?>" class="btn btn-sm btn-info text-white">Edit</a>
    <a href="users?user_delete_id=<?=$admin_user['id']?>" class="btn btn-sm btn-danger">Delete</a>
    </div>
    </div>
    <?php endforeach;?>
    <?php else: ?>
        <h5>No Admin User found!</h5>
    <?php endif;?>
    </div>


    </div>

<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>