<?php require("../path.php"); ?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/users.php'); 
adminOnly();
?>

    <div class="container-fluid">
    <form action="" method="post">
        <div class="p-4 mx-auto shadow rounded" style="width:100%;margin-top:50px;max-width:340px;">
        <h4 class="text-center">My_BlogWebsite</h4>
        <!-- <img src="/asset/logo2.png" alt="Image" class="d-block mx-auto" style="width:100px"> -->
        <h3>Add Admin User</h3>

        <?php include(ROOT_PATH."/app/helpers/errorsForm.php"); ?>

        <input class="my-2 form-control" value="<?=$username?>" type="text" name="username" placeholder="User-Name..." id="">
        <input class="my-2 form-control" value="<?=$email?>" type="email" name="email" placeholder="E-mail..." id="">
        <input class="my-2 form-control" value="<?=$password?>"  type="password" name="password" placeholder="Password..." id="">
        <input class="my-2 form-control" value="<?=$password2?>" type="password" name="password2" placeholder="Retype Password...">
        
        <?php if(isset($admin)): ?>
        <div class="form-check mb-3">
        <input class="form-check-input border-success border-start border-2" checked name="admin"  type="checkbox" id="gridCheck">
        <label class="form-check-label " for="gridCheck">
        Admin
        </label>
        </div>
            <?php else:?>
        <div class="form-check mb-3">
        <input class="form-check-input border-success border-start border-2"  name="admin"  type="checkbox" id="gridCheck">
        <label class="form-check-label " for="gridCheck">
        Admin
        </label>
        </div>
                <?php endif;?>


        <button class="btn btn-primary float-end" name="create_admin">Add User</button>
        
        <a href="<?=BASE_URL.'/users/users.php'?>">
        <button type="button" class="btn btn-danger text-white">Cancel</button>
        </a>

        </div>
    </form>
    </div>


    <!-- echo out records frm database -->

    <?php

    ?>

<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>