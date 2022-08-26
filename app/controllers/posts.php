<?php
require(ROOT_PATH.'/app/model/functions.php');
require(ROOT_PATH.'/app/helpers/middleware.php');
require(ROOT_PATH.'/app/helpers/validatePost.php');
// adminOnly();
$table ='blog_post';

$categories = selectAll('blog_category');
$posts = selectAll($table);
$errors = array();
$post_title = "";
$post_description = "";
$category_id = "";
$post_id = "";
$post_published = "";
$post_slug = "";
$post_meta_keyword = "";
$post_meta_description = "";


$user = selectOne('blog_users', ['admin'=>1]);

if(isset($_POST['addPost'])) {  #create post
    // adminOnly();
    $errors = validatePost($_POST);
    
    if (!empty($_FILES['post_image']['name'])) 
    {
        $image_name = time() . '_' . $_FILES['post_image']['name']; #name
        $image_destination = ROOT_PATH."/asset/images/".$image_name; #destination

        $image_result = move_uploaded_file($_FILES['post_image']['tmp_name'],$image_destination); #moveimage to destination

        if ($image_result) {  #check if image succeed
            $_POST['post_image'] = $image_name;
        } else {
            $errors['post_image'] = "Image failed to upload";
        }
        
    }else {
        $errors['post_image'] = "An image is required";
    }

    if (count($errors) === 0) {
        
        unset($_POST['addPost']);

    $_POST['category_id'];
    $_POST['user_id'] = $_SESSION['id'];
    $_POST['post_created_by'] = $_SESSION['username'];
    $_POST['post_published'] = isset($_POST['post_published']) ? 1 : 0;
    $_POST['post_description'] = htmlentities($_POST['post_description']);
        #remove all special chars for slug
        $_POST['post_slug']= preg_replace("/[^A_Za-z0-9\-]/", "-", $_POST['post_slug']);
        $_POST['post_slug']= preg_replace("/-+/", "-", $_POST['post_slug']);
        
    
    $post_id = create($table,$_POST);
    $_SESSION['message'] = "<h5 class='alert alert-success'>Post Created Succesfully!</h5>";
    header('location: '.BASE_URL.'/blogs/blogs');
    exit();
    } else {
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $category_id = $_POST['category_id']; 
    $post_slug = $_POST['post_slug'];
    $post_meta_keyword = $_POST['post_meta_keyword'];
    $post_meta_description = $_POST['post_meta_description'];
    $post_published = isset($_POST['post_published']) ? 1 : 0;
    }
}

if (isset($_GET['post_update_id'])) {
    
    $post = selectOne($table,['id'=> $_GET['post_update_id']]);

    $post_id = $post['id'];                                       #update post
    $post_title = $post['post_title'];
    $post_description = $post['post_description'];
    $category_id = $post['category_id'];
    $post_slug = $post['post_slug'];
    $post_meta_keyword = $post['post_meta_keyword'];
    $post_meta_description = $post['post_meta_description'];
    $post_published = isset($post['post_published']) ? 1 : 0;
}

if (isset($_POST['update-post'])) {
    // adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['post_image']['name'])) 
    {
        $image_name = time() . '_' . $_FILES['post_image']['name']; #name
        $image_destination = ROOT_PATH."/asset/images/".$image_name; #destination

        $image_result = move_uploaded_file($_FILES['post_image']['tmp_name'],$image_destination); #moveimage to destination

        if ($image_result) {  #check if image succeed
            $_POST['post_image'] = $image_name;
        } else {
            $errors['post_image'] = "Image failed to upload";
        }
        
    }else {
        $errors['post_image'] = "An image is required";
    }

    
    if (count($errors) == 0) {

        $id = $_POST['id'];
        unset($_POST['update-post'],$_POST['id']);
        $_POST['category_id'];
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['post_published'] = isset($_POST['post_published']) ? 1 : 0;

        #remove all special chars for slug
        $_POST['post_slug'] = preg_replace("/[^A_Za-z0-9\-]/", "-", $_POST['post_slug']);
        $_POST['post_slug'] = preg_replace("/-+/", "-", $_POST['post_slug']);
    
        $post_id = update($table, $id, $_POST); 
        $_SESSION['message'] = "<h5 class='alert alert-success'>Post Updated Succesfully!</h5>";
        header('location: '.BASE_URL.'/blogs/blogs.php');
        exit();
        } else {
        $post_title = $_POST['post_title'];
        $post_description = $_POST['post_description'];
        $category_id = $_POST['category_id']; 
        $post_slug  = $_POST['post_slug'];
        $post_meta_keyword = $_POST['post_meta_keyword'];
        $post_meta_description = $_POST['post_meta_description'];
        $post_published = isset($_POST['post_published']) ? 1 : 0;
        $_POST['post_description'] = htmlentities($_POST['post_description']);
        }

}

if (isset($_GET['post_delete_id'])) {   #delete post
    // adminOnly();
    $count = delete($table,$_GET['post_delete_id']);
    $_SESSION['message'] = "<h5 class='alert alert-success'>Post Deleted Succesfully!</h5>";
    header('location: '.BASE_URL.'/blogs/blogs.php');
    exit(0);
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    // adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];
    $count = update($table, $p_id, ['post_published' => $published]);
    $_SESSION['message'] = "<h5 class='alert alert-success'>Post Published Status Change!</h5>";
    header('location: '.BASE_URL.'/blogs/blogs.php');
    exit(0);
}