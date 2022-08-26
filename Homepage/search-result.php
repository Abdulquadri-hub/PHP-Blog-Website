<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 

    $page_title = "Search-Result Page";
    $meta_description = "Search-Result page description blogging website";
    $meta_keywords = "html, php, javascript, python, ajax, jquery";

    // if (isset($_POST['search-term'])) {
    //   // $categoryPosts  = searchPosts($_POST['search-term']);
    //   show($_POST);
    // }
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>Quadri Blogwebsite - Index</title> -->
  <title><?php if(isset($page_title)){ echo "$page_title"; } else{ echo "Quadri-Blogwebsite"; } ?></title>
  <meta content = "<?php if(isset($meta_description)){ echo "$meta_description"; }  ?>" name="description" />
  <meta content = "<?php if(isset($meta_keywords)){ echo "$meta_keywords"; }  ?>" name="keywords" />
  <meta name="author" content="Quadri-PHP" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog - v1.0.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>
<!-- Hoempage Header -->
<?php include(ROOT_PATH.'/app/includes/homepageheader.php'); ?>

  <main id="main">
    <!-- ======= Search Results ======= -->
    <section id="search-result" class="search-result">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h3 class="category-title">Search Results</h3>
            <?php if($categoryPosts):?>
            <?php foreach($categoryPosts as $categoryPost):?>

            <div class="d-md-flex post-entry-2 small-img">
              <a href="single-post.html" class="me-4 thumbnail">
                <img src="<?=BASE_URL.'/asset/images/'.$categoryPost['post_image'];?>" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date"><?=$categoryPost['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=date('F j, Y', strtotime($categoryPost['post_created_at']));?></span></div>
                <h3><a href="<?= BASE_URL."/homepage/single-post.php?title=".$categoryPost['post_slug'];?>l"><?=$categoryPost['post_title'];?></a></h3>
                <p><?=substr($categoryPost['post_description'], 0, 150), "...";?></p>
                <div class="d-flex align-items-center author">
                  <!-- <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div> -->
                  <div class="name">
                    <h3 class="m-0 p-0"><?=$categoryPost['post_created_by'];?></h3>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
            <!-- Paging -->
            <div class="text-start py-4">
              <div class="custom-pagination">
                <a href="#" class="prev">Prevous</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#" class="next">Next</a>
              </div>
            </div><!-- End Paging -->
            <?php else: ?>
            <div>No Searched Post!</div>
            <?php endif;?>
          </div>


          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false"><?=$trending?></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <?php foreach($published_posts as $published_post):?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$published_post['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y', strtotime($published_post['post_created_at']));?></span></div>
                    <h2 class="mb-2"><a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>"><?=$published_post['post_title'];?></a></h2>
                    <span class="author mb-3 d-block"><?=$published_post['post_created_by'];?></span>
                  </div>
                  <?php endforeach;?>

                </div> <!-- End Popular -->

                <!-- Trending -->
                <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                <?php foreach($trends as $trend): ?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$trend['category_name'];?></span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="<?= BASE_URL."/homepage/single-post.php?title=".$trend['post_slug'];?>"><?=$trend['post_title'];?></a></h2>
                    <span class="author mb-3 d-block"><?=$trend['post_created_by'];?></span>
                  </div>
                  <?php  endforeach; ?>
                </div> <!-- End Trending -->

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                  <?php foreach($trends as $trend): ?>
                  <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"><?=$trend['category_name'];?></span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="<?= BASE_URL."/homepage/single-post.php?title=".$trend['post_slug'];?>"><?=$trend['post_title'];?></a></h2>
                    <span class="author mb-3 d-block"><?=$trend['post_created_by'];?> </span>
                  </div>
                  <?php  endforeach; ?>
                </div> <!-- End Latest -->

              </div>
            </div>


            <div class="aside-block">
              <h3 class="aside-title"><?=$ctg?></h3>
              <ul class="aside-links list-unstyled">
              <?php foreach($categories as $category):?>
              <li><a href="<?= BASE_URL."/homepage/category.php?title=".$category['category_slug'];?>"><i class="bi bi-chevron-right"></i> <?=$category['category_name']?></a></li>
              <?php endforeach;?>
              </ul>
            </div><!-- End Categories -->

          </div>

        </div>
      </div>
    </section> <!-- End Search Result -->

  </main><!-- End #main -->

  <?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>

</body>

</html>