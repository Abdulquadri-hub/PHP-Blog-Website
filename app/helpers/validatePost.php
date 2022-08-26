<?php

function validatePost($post)
{
    $errors = array();

    
    if (empty($post['post_title'])) {
        
        $errors['post_title'] = "Post title is required ";
    }
    
    if (empty($post['post_description'])) {
            
        $errors['post_description'] = "Post description is required";
    }
    
    if (empty($post['category_id'])) {
        
        $errors['category_id'] = "Please select a category";
    }

    if (empty($post['post_slug'])) {
        
        $errors['post_slug'] = "post slug is required";
    }

    if (empty($post['post_meta_keyword'])) {
        
        $errors['post_meta_keyword'] = "Post meta keyword is required";
    }

    #post already esixts
    $postExists = selectOne('blog_post',['post_title'=>$post['post_title']]);
    if ($postExists) {
        if ($post['update-post'] && $postExists['id'] != $post['id']) {
            $errors['post_title'] = "Post with that title  Already Exists";
        }

        if (isset($post['add-post'])) {
            $errors['post_title'] = "Post with that title Already Exists";
        }
    }

    return $errors;
}