<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 
  if($getPosts) {
foreach($getPosts as $getPost){
// show($getPost);
    $page_title = $getPost['post_title'];
    $meta_description = $getPost['post_meta_description'];
    $meta_keywords = $getPost['post_meta_keyword'];

}
  } else {
    $page_title = "Single-Post Page";
    $meta_description = "Single-Post page description blogging website";
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

<?php include(ROOT_PATH.'/app/includes/homepageheader.php'); ?>

  <main id="main">
    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <?php if(isset($getPosts)): ?>
            <?php foreach($getPosts as $getPost): ?>
          <div class="single-post">
            <div class="post-meta"><span class="date"><?=$getPost['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=date("F j, Y", strtotime($getPost['post_created_at']))?></span></div>
              <h1 class="mb-5"><?=$getPost['post_title'];?></h1>
              <p><?=$getPost['post_description'];?></p>
            <?php endforeach; ?>                    
            </div>
            <?php else: ?>
            <div>No post created!!</div>
            <?php endif; ?>
            <!-- End Single Post Content -->

            <!-- ======= Comments ======= -->
            <div class="comments">
              <div class="comment d-flex mb-4">
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-replies bg-light p-3 mt-3 rounded"> 
                    <?php if($comments): ?>
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">Comments</h6>
                    <?php foreach($comments as $comment): ?>
                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div> 
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2"><?=$comment['name']?></h6>
                          <span class="text-muted"><?= date("h:i:a", strtotime($comment['date'])) ?></span>
                        </div>
                        <div class="reply-body">
                        <?= $comment['message']?>
                        </div>
                      </div> 
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div>No Comments!!</div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div><!-- End Comments -->


            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">
              <form action="" method="post">
              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <?php include(ROOT_PATH."/app/helpers/errorsForm.php"); ?>
                <?php include(ROOT_PATH.'/app/includes/messages.php'); ?>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" name="name"  id="" placeholder="Enter your name">
                  </div>

                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>
                    <textarea class="form-control" id="comment-message"  name="message" placeholder="Enter your name"></textarea>
                  </div>
                  
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" name="commentbtn" value="Post comment">
                  </div>
                </div>
              </div>
              </form>
            </div><!-- End Comments Form -->

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
                    <div class="post-meta"><span class="date"><?=$trend['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y', strtotime($trend['post_created_at']));?></span></div>
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


            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="category.php">Business</a></li>
                <li><a href="category.php">Culture</a></li>
                <li><a href="category.php">Sport</a></li>
                <li><a href="category.php">Food</a></li>
                <li><a href="category.php">Politics</a></li>
                <li><a href="category.php">Celebrity</a></li>
                <li><a href="category.php">Startups</a></li>
                <li><a href="category.php">Travel</a></li>
              </ul>
            </div><!-- End Tags -->

          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>

</body>

</html>