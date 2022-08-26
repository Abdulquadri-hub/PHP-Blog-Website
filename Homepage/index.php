<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 
  $page_title = "Home Page";
  $meta_description = "Home page description blogging website";
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
<!-- Homepage header -->
<?php include(ROOT_PATH.'/app/includes/homepageheader.php'); ?>

  <main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
    <?php foreach($published_posts as $published_post): ?>
                <div class="swiper-slide">
                    <a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>" class="img-bg d-flex align-items-end" style="background-image:url('<?=BASE_URL.'/asset/images/'.$published_post['post_image']?>')">
                      <div class="img-bg-inner">
                      <h2><?=$published_post['post_title']?></h2>
                      <p><?=substr($published_post['post_description'], 0, 150), "..."?></p>
                    </div>
                  </a>
                </div>
    <?php endforeach;?>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->


    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
        <div class="col-lg-4">
        <?php foreach($published_ps as $published_p): ?>
            <div class="post-entry-1 lg">
              <a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_p['post_slug'];?>"><img src="<?=BASE_URL.'/asset/images/'.$published_p['post_image'];?>" alt="" class="img-fluid"></a>
              <div class="post-meta"><span class="date"><?=$published_p['category_name']?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y',strtotime($published_p['post_created_at']));?></span></div>
              <h2><a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_p['post_slug'];?>"><?=$published_p['post_title'];?></a></h2>
              <p class="mb-4 d-block"><?=$published_p['post_description'];?></p>

              <div class="d-flex align-items-center author">
                <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                <div class="name">
                  <?php 
                  if($user): ?>
                  <h3 class="m-0 p-0"><?=$user['username'];?></h3>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>


          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
            <?php foreach($published_posts as $published_post): ?>  
                <div class="post-entry-1">
                  <a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>"><img src="<?=BASE_URL.'/asset/images/'.$published_post['post_image'];?>" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date"><?=$published_post['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y', strtotime($published_post['post_created_at']));?></span></div>
                  <h2><a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>"><?=$published_post['post_title'];?></a></h2>
                </div>
              <?php endforeach;?>
              </div>

              <div class="col-lg-4 border-start custom-border">
            <?php foreach($published_posts as $published_post): ?>  
                <div class="post-entry-1">
                  <a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>"><img src=<?=BASE_URL.'/asset/images/'.$published_post['post_image'];?> alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date"><?=$published_post['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y', strtotime($published_p['post_created_at']));?></span></div>
                  <h2><a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>"><?=$published_post['post_title'];?></a></h2>
                </div>
              <?php endforeach;?>
              </div>

              <!-- Trending Section -->
              <div class="col-lg-4">

                <div class="trending">
                  <h3><?=$trending?></h3>
                  <ul class="trending-post">
                    <li>
                      <?php $key = 1; ?>
                      <?php foreach($trends as $trend): ?>
                      <a href="<?= BASE_URL."/homepage/single-post.php?title=".$trend['post_slug'];?>">
                        <span class="number"><?=$key++;?></span>
                        <h3><?=$trend['post_title'];?></h3>
                        <span class="author"><?= $user['username'];?></span>
                      </a>
                      <?php  endforeach; ?>
                  </ul>
                </div>

              </div> <!-- End Trending Section -->
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

      </div>



  </main><!-- End #main -->

<?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>
  
</body>

</html>