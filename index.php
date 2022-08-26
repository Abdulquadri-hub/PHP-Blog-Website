
<?php include("path.php");?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); 
require_once(ROOT_PATH.'/app/helpers/middleware.php');
loginFirst();
adminOnly();
?>

    <div class="container-fluid">
    <?php include(ROOT_PATH.'/app/includes/messages.php'); ?>
    </div>

    <!-- echo out records frm database -->

    <?php include(ROOT_PATH.'/app/includes/footer.php'); ?>