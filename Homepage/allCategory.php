<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 

    $page_title = "All-Category Page";
    $meta_description = "All-Category page description blogging website";
    $meta_keywords = "html, php, javascript, python, ajax, jquery";
  
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
    <section>
      <div class="container">
        <div class="row">


              <!-- Trending Section -->
              <div class="col-lg-4">

                <div class="trending">
                  <h3><?=$ctg?></h3>
                  <ul class="trending-post">
                    <li>
                      
                      <?php foreach($categories as $category): ?>
                      <a href="<?= BASE_URL."/homepage/category.php?title=".$category['category_slug'];?>">
                        <span class="number"></span>
                        <h3><?=$category['category_name'];?></h3>
                        <span class="author"></span>
                      </a>
                      <?php endforeach; ?>
                  </ul>
                </div>

              </div> <!-- End Trending Section -->

        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>

</body>

</html>