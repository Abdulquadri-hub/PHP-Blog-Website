<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1><?=$websiteName?></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <?php foreach($pages as $page): ?>
          <li><a href="index.php"> <?=$page['blog'];?></a></li>
          <!-- <li><a href="single-post.php">?></a></li> -->
          <li class="dropdown"><a href="<?=BASE_URL.'/homepage/allcategory.php'?>"><span><?=$page['categories'];?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
            <li><a href="search-result.php">Search-Result</a></li>
              <?php foreach($categories as $category):?>
              <li><a href="<?=BASE_URL."/homepage/category.php?title=".$category['category_slug'];?>"><?=$category['category_name']?></a></li>
              <?php endforeach; #categories?>
            </ul>
          </li>

          <li><a href="about.php"><?=$page['about'];?></a></li>
          <li><a href="contact.php"><?=$page['contact'];?></a></li>
          <?php endforeach; ?>
        </ul>
      </nav><!-- .navbar -->


      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
        <form action="search-result.php" method = "post" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" name="search-term" placeholder="Search" class="form-control float-end">
            <span class="btn js-search-close bi-x"></span>
          </form>
        </div> 
        <!-- End Search Form -->
      </div>

    </div>

  </header><!-- End Header -->