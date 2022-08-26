<?php
require(ROOT_PATH.'/app/model/functions.php');
require(ROOT_PATH.'/app/helpers/middleware.php');
require(ROOT_PATH.'/app/helpers/validateCategory.php');
// adminOnly();

$table = "blog_category";
$errors = array();
$id = "";
$category_name = "";
$category_slug = "";
$category_description = "";
$category_meta_keyword = "";
$category_meta_description = "";

$categories = selectAll($table);

if (isset($_POST['add-category'])) {
    // adminOnly();


    $errors = validateCategory($_POST);
    // show($errors);

    if (count($errors) === 0) {
        unset($_POST['add-category'], $_POST['files']);
        $_POST['category_created_by'] = $_SESSION['username'];
        $_POST['category_description'] = htmlspecialchars($_POST['category_description']);
                    #remove all special chars for slug
                    $_POST['category_slug']= preg_replace("/[^A_Za-z0-9\-]/", "-", $_POST['category_slug']);
                    $_POST['category_slug']= preg_replace("/-+/", "-", $_POST['category_slug']);
                
        $category_id = create($table, $_POST);
        $_SESSION['message'] = "<h5 class='alert alert-success'>Category Created Succesfully!</h5>";
        header('location: '.BASE_URL.'/categories/category.php');
        exit();
    }else {
        $category_name = $_POST['category_name'];
        $category_slug = $_POST['category_slug'];
        $category_description = $_POST['category_description'];
        $category_meta_keyword = $_POST['category_meta_keyword'];
        $category_meta_description  = $_POST['category_meta_description'];
    }
}

#update category
if (isset($_GET['category_update_id'])) {
    # code...
    $id = $_GET['category_update_id'];
    $category = selectOne($table, ['id'=>$id]);
    $id = $category['id'];
    $category_name = $category['category_name'];
    $category_slug= $category['category_slug'];
    $category_description= $category['category_description'];
    $category_meta_keyword = $category['category_meta_keyword'];
    $category_meta_description = $category['category_meta_description'];
}

if (isset($_POST['upadate-category'])) {
    
    // adminOnly();
    $errors = validateCategory($_POST);

    if (count($errors) === 0) {
        
    $id = $_POST['id'];
    unset($_POST['upadate-category'], $_POST['id'], $_POST['files']);
    $_POST['category_description'] = htmlentities($_POST['category_description']);

            #remove all special chars for slug
            $_POST['category_slug']= preg_replace("/[^A_Za-z0-9\-]/", "-", $_POST['category_slug']);
            $_POST['category_slug']= preg_replace("/-+/", "-", $_POST['category_slug']);
        
    // show($_POST);
    $category_id = update($table, $id, $_POST);
    $_SESSION['message'] = "<h5 class='alert alert-success'>Category Updated Successfully!</h5>";
    header('location: '.BASE_URL.'/categories/category.php');
    exit();
    } else {
        $category_name = $_POST['category_name'];
        $category_slug = $_POST['category_slug'];
        $category_description = $_POST['category_description'];
        $category_meta_keyword = $_POST['category_meta_keyword'];
        $category_meta_description = $_POST['category_meta_description'];
        $id = $_POST['id'];
    }

}

#delete category
if (isset($_GET['category_delete_id'])) {
    // adminOnly();
    $id = $_GET['category_delete_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = "<h5 class='alert alert-success'>Category Deleted Successfully!</h5>";
    header('location: '.BASE_URL.'/categories/category.php');
    exit();
}
