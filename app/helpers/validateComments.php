<?php

function validateComments($comment)
{
    $errors = array();

    
    if (empty($comment['name'])) {
        
        $errors['name'] = "name is required ";
    }
    
    
    if (empty($comment['message'])) {
        
        $errors['message'] = "message is required";
    }
    return $errors;
}