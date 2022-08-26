<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 
  if($about){
    foreach($about as $about1){
    $page_title = $about1['about_name'];
    $meta_description = $about1['about_meta_description'];
    $meta_keywords = $about1['about_meta_keyword'];
    }
  }else{
  $page_title = "About Quadri-Blogwebsite";
  $meta_description = "About  Quadri-Blogwebsite page description blogging website";
  $meta_keywords = "html, php, javascript, python, ajax, jquery";
  }

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
<!-- Homepage Header -->
<?php include(ROOT_PATH.'/app/includes/homepageheader.php'); ?>


  <main id="main">
    <section>
      <div class="container" data-aos="fade-up">
      <?php if(isset($abouts)): ?>
      <?php foreach($abouts as $about): ?>
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title"><?=$about['about_title']?></h1>
          </div>
        </div>

        <div class="row mb-5">
          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
            </a>
            <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4"><?=$about['about_name']?></div>
              <h2 class="mb-4 display-4"><?=$about['about_title']?></h2>

              <p><?=$about['about_description']?></p>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div>About Page Not Created!</div>
        <?php endif; ?>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>

</body>

</html>