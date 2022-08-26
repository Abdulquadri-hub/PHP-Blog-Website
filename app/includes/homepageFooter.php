<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">

    <div class="row g-5">
      <div class="col-lg-4">
        <?php foreach($about as $aboutOne):?>
        <h3 class="footer-heading"><?=$aboutOne['about_title'];?></h3>
        <p><?=$aboutOne['about_description'];?></p>
        <p><a href="about.php" class="footer-link-more">Learn More</a></p>
        <?php endforeach;?>
      </div>

      <div class="col-6 col-lg-2">
        <h3 class="footer-heading"><?=$navigation;?></h3>
        <ul class="footer-links list-unstyled">
          <?php foreach($pages as $page): ?>
          <li><a href="index.php"><i class="bi bi-chevron-right"></i> <?=$page['home'];?></a></li>
          <li><a href="index.php"><i class="bi bi-chevron-right"></i> <?=$page['blog'];?></a></li>
          <li><a href="allcategory.php"><i class="bi bi-chevron-right"></i> <?=$page['categories'];?></a></li>
          <li><a href="about.php"><i class="bi bi-chevron-right"></i> <?=$page['about'];?></a></li>
          <li><a href="contact.php"><i class="bi bi-chevron-right"></i> <?=$page['contact'];?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="col-6 col-lg-2">
        <h3 class="footer-heading"><?=$ctg;?></h3>
        <ul class="footer-links list-unstyled">
        <?php foreach($categories as $category):?>
          <li><a href="<?= BASE_URL."/homepage/category.php?title=".$category['category_slug'];?>"><i class="bi bi-chevron-right"></i> <?=$category['category_name']?></a></li>
          <?php endforeach;?>
        </ul>
      </div>

      <div class="col-lg-4">
        <h3 class="footer-heading"><?=$recent;?></h3>

        <ul class="footer-links footer-blog-entry list-unstyled">
          <li>
            <?php foreach($published_posts as $published_post): ?>
            <a href="<?= BASE_URL."/homepage/single-post.php?title=".$published_post['post_slug'];?>" class="d-flex align-items-center">
              <img src="<?=BASE_URL.'/asset/images/'.$published_post['post_image'];?>" alt="" class="img-fluid me-3">
              <div>
                <div class="post-meta d-block"><span class="date"><?=$published_post['category_name'];?></span> <span class="mx-1">&bullet;</span> <span><?=Date('F j, Y', strtotime($published_post['post_created_at']));?></span></div>
                <span><?=$published_post['post_title'];?></span>
              </div>
            </a>
            <?php endforeach; ?>
          </li>

        </ul>

      </div>
    </div>
  </div>
</div>

<div class="footer-legal">
  <div class="container">

    <div class="row justify-content-between">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <div class="copyright">
          © Copyright <strong><span><?= date("Y")?></span></strong>. All Rights Reserved
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>

      </div>

      <div class="col-md-6">
        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
          <a href="www.twitter.com" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="www.facebook.com" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="www.instagram.com" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="www.skype.com" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="www.linkedin.com" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>

    </div>

  </div>
</div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
