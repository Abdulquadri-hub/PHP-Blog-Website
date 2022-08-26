
<?php

#category
function validateCategory($category)
{
    $errors = array();
    if (empty($category['category_name']) || !preg_match("/^[a-z A-Z]+$/",$category['category_name'])) 
    {
        $errors['category_name'] = "Only letters is allowed in category name";
    }
    
    if (empty($category['category_slug'])) {
        
        $errors['category_slug'] = "category slug is required";
    }

    if (empty($category['category_meta_keyword'])) {
        
        $errors['category_meta_keyword'] = "category meta keyword is required";
    }

    $categoryExists = selectOne('blog_category', ['category_name'=>$category['category_name']]);
    if ($categoryExists) {
        if ($category['upadate-category'] && $categoryExists['id'] != $category['id']) {
            $errors['category_name'] = "category name Already Exists";
        }

        if (isset($category['add-category'])) {
            $errors['category_name'] = "category name Already Exists";
        }
    }

    return $errors;
}