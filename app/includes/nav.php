
<style>
    nav ul li a {
        width: 110px;
        text-align: center;
        border-left: solid thin #eee;
        border-left: solid thin #fff;
    }
        nav ul li a:hover {
        background-color: grey;
        color: white !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light  p-2">
<div class="container-fluid">
    <a class="navbar-brand" href="<?=BASE_URL.'/index'?>">
    <img src="<?=BASE_URL.'/asset/admin.png'?>" alt="Image" class="" style="width:50px">
    Admin Forum
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>">DASHBOARD</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL.'/blogs/blogs'?>">BLOGS</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL.'/categories/category'?>">CATEGORIES</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL.'/users/users'?>">USERS</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=BASE_URL.'/setting'?>">SETTING</a>
        </li>

        </ul>
        <?php if(isset($_SESSION['admin'])):?> 
            
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropdown-menu-end">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['username'] ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=BASE_URL.'/profile?user='.$_SESSION['username']?>">Profile</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=BASE_URL.'/logout'?>">Logout</a></li>
        </ul>
        </li>
    </ul>
    <?php else: ?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropdown-menu-end">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            No User!
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=BASE_URL.'/profile'?>">Profile</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL.'/login'?>">Login</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=BASE_URL.'/logout'?>">Logout</a></li>
        </ul>
        </li>
    </ul>
    <?php endif;?>
    </div>
</div>
</nav> 
