<?php require("path.php"); ?>
<?php require(ROOT_PATH.'/app/controllers/users.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $page_title = "Register Page";
    $meta_description = "Register Page description Admin panel";
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
    <div class="container-fluid">
    <form action="" method="post">
        <div class="p-4 mx-auto shadow rounded" style="width:100%;margin-top:50px;max-width:340px;">
        <h4 class="text-center">My_BlogWebsite</h4>
        <!-- <img src="/asset/logo2.png" alt="Image" class="d-block mx-auto" style="width:100px"> -->
        <h3>Add User</h3>
        <?php include(ROOT_PATH."/app/helpers/errorsForm.php"); ?>
        <input class="my-2 form-control" value="<?=$username?>" type="text" name="username" placeholder="User-Name" id="">
        <input class="my-2 form-control" value="<?=$email?>" type="email" name="email" placeholder="E-mail" id="">
        <input class="my-2 form-control" value="<?=$password?>"  type="password" name="password" placeholder="Password" id="">
        <input class="my-2 form-control" value="<?=$password2?>" type="password" name="password2" placeholder="Retype Password">
        <br>
        <button class="btn btn-primary float-end" name="add_user">Add User</button>
        <a href="<?=BASE_URL.'/index.php'?>">
        <button type="button" class="btn btn-danger text-white">Cancel</button>
        </a>
        </div>
    </form>
    </div>
<?php include(ROOT_PATH.'/app/includes/footer.php'); ?>