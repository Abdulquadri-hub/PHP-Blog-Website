<?php include("../path.php"); ?>
<?php include(ROOT_PATH.'/app/includes/header.php'); ?>
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>
<?php require(ROOT_PATH.'/app/controllers/posts.php'); 
adminOnly();
?>


<div class="container-fluid shadow mx-auto " style="max-width:1000px;">
    <h3 class="mb-4 card-subtitle">Add New Post</h3>

    
            <!-- get errors -->
            <?php include(ROOT_PATH.'/app/helpers/errorsForm.php'); ?>

    <form action="" class="row g-3" method="post" enctype="multipart/form-data">

<div class="col-md-6 mb-4 me-4">
    <label for="Title" class="form-label border-success border-start border-5">Title</label>
    <input type="text" value="<?=$post_title?>" name="post_title" class="form-control border-0 border-bottom border-danger" id="">
</div>

<div class="col-md-4">
    <label for="inputState" class="form-label border-success border-start border-5">Categories</label>
    <select id="inputState"  name="category_id" id="summernote" class="form-select">
    <option selected>Choose...</option>
    <?php foreach($categories as $key => $category):?>
        <?php if(!empty($category_id) && $category_id == $category['id']): ?>
            <option selected value="<?=$category['id']?>"><?=$category['category_name']?></option>
            <?php else:?>
                <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
                <?php endif;?>
    <?php endforeach;?>
    </select>
</div>

<div class="col-md-20">
    <label for="" class="form-label border-success border-start border-5">Decription</label>
    <label for="inputPassword4" class="form-label"></label>
    <textarea name="post_description"  id="summernote"  class="form-control" cols="" rows=""><?=$post_description?></textarea>
</div>

<div class="col-md-20">
    <label for="" class="form-label border-success border-start border-5">Meta_Decription</label>
    <label for="inputPassword4" class="form-label"></label>
    <textarea name="post_meta_description"  id="summernote"  class="form-control" cols="" rows=""><?=$post_meta_description?></textarea>
</div>

<div class="mb-3">
<label for="" class="form-label border-success border-start border-5">Image</label>
    <input type="file" value="<?=$post_image?>" class="form-control" name="post_image"  aria-label="file example" >
</div>

<div class="mb-3">
<label for="" class="form-label border-success border-start border-5">Slug</label>
    <input type="text" value="<?=$post_slug?>" class="form-control" name="post_slug"  aria-label="file example" >
</div>

<div class="mb-3">
<label for="" class="form-label border-success border-start border-5">Meta Keyword</label>
    <input type="text" value="<?=$post_meta_keyword?>" class="form-control" name="post_meta_keyword"  aria-label="file example" >
</div>

<div class="col-12">
    <div class="form-check">
    <?php if(empty($post_published)):?>
    <input class="form-check-input border-success border-start border-2" name="post_published"  type="checkbox" id="gridCheck">
    <label class="form-check-label " for="gridCheck">
        Publish
    </label>
    <?php else:?>
        <input class="form-check-input border-success border-start border-2" checked name="post_published"  type="checkbox" id="gridCheck">
    <label class="form-check-label " for="gridCheck">
        Publish
    </label>
        <?php endif;?>
    </div>
</div>

<div class="col-12 mb-4 input-group">
<a href="<?= BASE_URL.'/blogs/blogs'?>">
    <input class="btn btn-outline-danger text-secondary" type="button" value="Cancel">
</a>
<input class="btn btn-outline-primary float-end text-secondary mx-5" name="addPost" type="submit" value="Create">
</div>
</form>
    </div> 


<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>