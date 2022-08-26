<?php
require(ROOT_PATH.'/app/model/functions.php');
require(ROOT_PATH.'/app/helpers/middleware.php');
include(ROOT_PATH.'/app/helpers/validateUser.php');
// adminOnly();
$table = "blog_users";


$admin_users = selectAll($table);

if(isset($_GET['adminuser']))
{
    $profiles = selectWithCondition($table, ['username' => $_GET['adminuser']]);
    // show($adminusers);
}

if(isset($_GET['user']))
{
    $profiles = selectWithCondition($table, ['username' => $_GET['user']]);
    // show($adminusers);
}

$errors = array();
$id = "";
$username = "";
$admin = "";
$email = "";
$password = "";
$password2 = "";

#loginUser function
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = "<h6 class='alert alert-success'>Welcome BAck!</h6>";
    header('location: '.BASE_URL.'/index.php');
    if ($_SESSION['admin'] == 1) {
        header('location: '.BASE_URL.'/index.php');
    } else{
        header('location: '.BASE_URL.'/Homepage/index.php');
    }
    exit();

}

if(isset($_POST['add_user']) || isset($_POST['create_admin']))
{
    // adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {

        unset($_POST['password2'],$_POST['add_user'],$_POST['create_admin']);
        
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

        if (isset($_POST['admin'])) {
            
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = "<h6 class='alert alert-success'>Admin User Created Successfully!</h6>";
            header('location: '.BASE_URL.'/users/users.php');
            exit();
        }else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            #login user: this mean putting the user in a session
            loginUser($user);
        }
    }else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
    }

}

#loginsystem
if (isset($_POST['Login-user'])) {

    $errors = validateLogin($_POST);
    
    if (count($errors) === 0) {
        $user = selectOne($table,['username'=>$_POST['username']]);
        // show($user);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            
        #login user: this mean putting the user in a session
        loginUser($user);
        }
    }else {
        array_push($errors, "Wrong Login Details");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

#delete admin user
if (isset($_GET['user_delete_id'])) {
    // adminOnly();
    $count = delete($table, $_GET['user_delete_id']);
    $_SESSION['message'] = "<h6 class='alert alert-success'>Admin User Deleted Successfully!</h6>";
    header('location: '.BASE_URL.'/users/users.php');
    exit();
}

#update admin user
if (isset($_GET['user_update_id'])) {

    $user = selectOne($table, ['id' => $_GET['user_update_id']] );
    $id = $user['id'];
    $username = $user['username'];
    $admin = isset($user['admin']) ? 1 : 0;
    $email = $user['email'];

}

if (isset($_POST['update_user'])) {
    // adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update_user'], $_POST['password2'], $_POST['id']);
        
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
            
            $_POST['admin'] = $_POST['admin'] == 1 ? 1 : 0;
            $user_id = update($table, $id, $_POST);
            $_SESSION['message'] = "<h6 class='alert alert-success'>Admin User Updated Successfully!</h6>";
            header('location: '.BASE_URL.'/users/users.php');
            exit();
    }else {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
    }

}


