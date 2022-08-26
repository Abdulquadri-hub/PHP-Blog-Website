<?php include("path.php"); ?>
<?php require(ROOT_PATH.'/app/controllers/users.php');
adminOnly(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $page_title = "Profile Page";
    $meta_description = "Profile Page description Admin panel";
    $meta_keywords = "categories, blogs, html, php, javascript, ptyjon, ajax, jquery"; 
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dashboard</title> -->
    <title><?php if(isset($page_title)){ echo "$page_title"; } else{ echo "Quadri-Blogwebsite-Admin-panel"; } ?></title>
    <meta content = "<?php if(isset($meta_description)){ echo "$meta_description"; }  ?>" name="description" />
    <meta content = "<?php if(isset($meta_keywords)){ echo "$meta_keywords"; }  ?>" name="keywords" />
    <meta name="author" content="Quadri-PHP" />

    <link rel="stylesheet" href="<?=BASE_URL.'/asset/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=BASE_URL.'/asset/all.min.css'?>">

    <!-----CSS CDN for summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-----END CSS CDN for summernote -->
</head>
<body>
    <style>
        .fa{
            margin-right: 4px;
        }
    </style>
    <div style="min-width:350px;">
<?php include(ROOT_PATH.'/app/includes/nav.php'); ?>



<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
        <div class="row">
                <a href="<?=BASE_URL.'/index.php'?>">
            <button class="btn btn-sm btn-danger">Back</button>
    </a>
            <div class="col-sm-4 col-md-3">
    <img src="<?=BASE_URL.'/asset/user.png'?>" alt="Image" class="d-block mx-auto rounded-circle" style="width:160px">
                <h5 class="text-center">  </h5>
            </div>
            <div class="col-sm-3 col-md-9 bg-light p-2">
                <table class="table table-hover table-striped table-bordered">
            <?php if(isset($profiles)): ?>
                    <?php foreach($profiles as $profile):?>
                        
                <tr><th>User Name:</th><td><?=$profile['username'];?></td></tr>
                <tr><th>E-mail:</th><td><?=$profile['email'];?></td></tr>
                <tr><th>Date Created:</th><td><?=date("F j, Y", strtotime($profile['date']));?></td></tr>
                <?php endforeach;?>
    <?php else: ?>
        <h5>No Profile found!</h5>
    <?php endif;?>  
                </table>
            </div>
        </div>
        <br>
    </div>
    <?php include(ROOT_PATH.'/app/includes/footer.php'); ?>