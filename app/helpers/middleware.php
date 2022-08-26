<?php

#umcomment this to implement userOnly function

// function onlyUser($redirect = "/login.php")
// {
//     if(empty($_SESSION['id'])){
//         $_SESSION['message'] = "<h6 class='alert alert-danger'>You need to login first!</h6>";
//         header('location: '.BASE_URL.$redirect);
//         exit(0);
//     }
// }

function loginFirst($redirect = "/login.php")
{
    if(empty($_SESSION['id'])){
        $_SESSION['message'] = "<h6 class='alert alert-danger'>You need to login first!</h6>";
        header('location: '.BASE_URL.$redirect);
        exit(0);
    }
}

function adminOnly($redirect = "/homepage/index.php")
{
        if(empty($_SESSION['admin'])){
        $_SESSION['message'] = "<h6 class='alert alert-danger'>You are not authorized!</h6>";
        header('location: '.BASE_URL.$redirect);
        exit(0);
        }
}

function guestOnly($redirect = "/index.php")
{
    if(isset($_SESSION['id'])){
        header('location: '.BASE_URL.$redirect);
        exit(0);
    }
}