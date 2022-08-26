<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username']) || !preg_match("/^[a-zA-Z0-9]+$/",$user['username'])) {
        
        $errors['username'] = "Only letters & numbers is allowed in username";
    }
    // check email
    if (empty($user['email']) || !filter_var( $user['email'],FILTER_VALIDATE_EMAIL)) {
            
        $errors['email'] = "E-mail is not valid ";
    }
    // check for password match
    if (empty($user['password']) || $user['password'] != $user['password2']) {
        
        $errors['password'] = "The pasword do not match";
    }
    //password lenth 
    if (strlen($user['password']) < 8 ) {
        
        $errors['password'] = "Password must be at least 8 character long";
    }

    $existsEmail = selectOne('blog_users', ['email'=>$user['email']]);
    if ($existsEmail) {
        if ($user['update_user'] && $existsEmail['id'] != $user['id']) {
            $errors['email'] = "User email Already Exists";
        }

        if (isset($user['create_admin'])) {
            $errors['email'] = "users name Already Exists";
        }
    }

    #check  if usernname already exist
        $existsUsername = selectOne('blog_users',['username'=>$user['username']]);
        if ($existsUsername) {
            if ($user['update_user'] && $existsUsername['id'] != $user['id']) {
                $errors['username'] = "Username Already Exists";
            }

            if (isset($user['create_admin'])) {
            $errors['username'] = "username Already Exists";
        }
        }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();
    if (empty($user['username']) || !preg_match("/^[a-zA-Z0-9]+$/",$user['username'])) {
        
        $errors['username'] = "Only letters & numbers is allowed in username";
    }

    // check for password match
    if (empty($user['password'])) {
        
        $errors['password'] = "pasword is required";
    }
    return $errors;
}

