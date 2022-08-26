<?php
    require(ROOT_PATH.'/app/model/functions.php');

    $trending = "Trending";
    $recent = "Recent Posts";
    $websiteName = "Quadri-BlogWebsite"; 
    $ctg= "Categories";
    $navigation = "Navigation";
    $published_posts = getPublishedPosts();  
    $published_ps =  getPublishedPost();
    $trends = getTrendingPosts();
    $pages = selectAll('pages');
    $categories = selectAll('blog_category');
    $user = selectOne('blog_users',['admin' => 1]);
    $getPosts =  getPost();
    $categoryPosts  = getCategory();
    $abouts = selectAll('about_page');
    $about = selectWithCondition('about_page', ['id' => 1]);
    $comments = getComment();
    //include(ROOT_PATH."/homepage/forms/comment.php");



