<!DOCTYPE html>
<html lang="en">
<?php 
  include("../path.php");
  require(ROOT_PATH.'/app/includes/homepageview.php'); 
  
  $page_title = "Contact Page";
  $meta_description = "Contact page description blogging website";
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
<!-- Homepage Header -->
<?php include(ROOT_PATH.'/app/includes/homepageheader.php'); ?>


  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact us</h1>
          </div>
        </div>

        <div class="row gy-4">

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="form mt-5">
          <form action="" method="post"   class="" >
            <div class="row">
              <?php include(ROOT_PATH.'/homepage/forms/contact.php');?>
              <div class="form-group col-md-6 mb-3">
                <input type="text" name="name"  class="form-control"  placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mb-3">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="" placeholder="Message" required></textarea>
            </div>
            <!-- <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> -->
            <div class="text-center mt-3"><button type="submit"  class="btn btn-primary" name="send_message">Send Message</button></div>
          </form>
        </div><!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include(ROOT_PATH.'/app/includes/homepageFooter.php'); ?>

</body>

</html>