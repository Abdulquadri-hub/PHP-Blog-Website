<?php include("../path.php"); ?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/categories.php'); 
adminOnly();
?>



<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php    ?>

    <div class="card-group justify-content-center">

        <form method="post">
            <h3>Edit category</h3>

            <!-- get errors -->
            <?php include(ROOT_PATH.'/app/helpers/errorsForm.php'); ?>
            <!-- errors end -->
            
        <input value="<?=$id?>" type="hidden" name="id">

        <input autofocus type="text" value="<?=$category_name?>" name="category_name" class="form-control" placeholder="Category Name...">
    <br>
    <input autofocus class="form-control" value="<?=$category_slug?>" type="text" name="category_slug" placeholder="category Slug"> 
    <br>
    <input autofocus class="form-control" value="<?=$category_meta_keyword?>" type="text" name="category_meta_keyword" placeholder="category Meta Keyword"> 
    <br>
    <div class="col-md-20">
        <textarea name="category_description"  id="summernote"  class="form-control" placeholder="Description..." cols="100" rows=""><?=$category_description?></textarea>
    </div>
    <br>

    <div class="col-md-20">
        <textarea name="category_meta_description"  id="summernote"  class="form-control" placeholder="Meta Description..." cols="100" rows=""><?=$category_meta_description?></textarea>
    </div>
    <br>

        <a href="<?=BASE_URL.'/categories/category.php'?>">
        <input class="btn btn-danger text-white" type="button" value="Cancel">
        </a>

        <input class="btn btn-success text-white float-end" type="submit" name="upadate-category" value="Save">
        </form>
        <?php ?>
            <!-- <h4>That category was not found!</h4> -->
        <?php ?>
    </div>


    </div>


<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>