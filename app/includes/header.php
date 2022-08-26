<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $page_title = "Dashboard";
    $meta_description = "Dashboard description Admin panel";
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