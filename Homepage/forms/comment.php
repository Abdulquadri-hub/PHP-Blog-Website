<?php
    require(ROOT_PATH.'/app/helpers/validateComments.php');
    $errors = array();
    if(isset($_POST['commentbtn']) && isset($_GET['title']))  
    {
    $errors = validateComments($_POST);

    if(count($errors) === 0) 
    {
        unset($_POST['commentbtn']);
        $_POST['post_slug'] = $_GET['title'];
        $comment_id = create('comment',$_POST);
        $_SESSION['message'] = "<p class='alert alert-success'>Comment Successfully!</p>";
        header('location: '.BASE_URL.'/homepage/single-post?title='.$_GET['title']);
        exit(0);
    }
    }