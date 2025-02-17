<?php 
include 'backend/db.php'; // Connect to the database
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - WVAAE Webiste</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
 
</head>

<body class="blog-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="" style="width:100px;height:100px; transform: scale(2)">
        <!--<h1 class="sitename">UpConstruction</h1> <span>.</span>-->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="projects.html">Projects</a></li>
          <li><a href="blog.php" class="active">Blog</a></li>
          <!--<li><a href="blog.php">Gallery</a></li>-->
          <li><a href="contact.html">Contact</a></li>
        </ul>  
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1>Blog</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Events</h2>
        <p>Trainings and events we provided</p>
      </div><!-- End Section Title -->
      <div class="posts" id="posts-container"></div>

      <script>
        async function fetchPosts() {
            try {
                let response = await fetch('http://localhost:8000/read.php');
                let posts = await response.json();
                
                let postsContainer = document.getElementById('posts-container');
                postsContainer.innerHTML = '';  // Clear any existing content

                if (posts.length === 0) {
                    postsContainer.innerHTML = '<p>No posts available.</p>';
                    return;
                }

                posts.forEach(post => {
                    let postDiv = document.createElement('div');
                    postDiv.classList.add('post');
                    postDiv.innerHTML = `
                        <h3>${post.title}</h3>
                        <img src="${post.image}" alt="${post.title}">
                        <p>${post.content.replace(/\n/g, '<br>')}</p>
                        <small>Posted on: ${post.created_at}</small><br>
                        ${post.read_more_link ? `<a href="${post.read_more_link}" target="_blank">Read More</a>` : ''}
                    `;
                    postsContainer.appendChild(postDiv);
                });
            } catch (error) {
                console.error('Error fetching posts:', error);
                document.getElementById('posts-container').innerHTML = '<p>Failed to load posts.</p>';
            }
        }

        // Fetch posts when the page loads
        window.onload = fetchPosts;
</script>


    </section><!-- /Recent Blog Posts Section -->

    <!-- Blog Pagination Section -->
     <!--
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
-->
    </section><!-- /Blog Pagination Section -->
  
  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
          </a>
          <div class="footer-contact pt-3">
            <h4>About</h4>
            <p>WVAAE includes teachers and teacher trainers <br>who specialise in learning through singing and music, <br>creative art, and storytelling.</p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://web.facebook.com/profile.php?id=100065278110578"><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
            <a href=""><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="blog.php">Gallery</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="services.html">Arts</a></li>
            <li><a href="services.html">21st Century skills</a></li>
            <li><a href="services.html">Socila Intelligence</a></li>
            <li><a href="services.html">Climate Action</a></li>
            <li><a href="services.html">Online Learning</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Contact Us</h4>
          <div class="footer-contact pt-3">
            <p>Comoros St, Addis Ababa 104</p>
            <p>Addis Ababa, Ethiopia</p>
            <p class="mt-3"><strong>Phone:</strong> <span>: +251 923 712 654 / +251 913 179 477</span></p>
            <p><strong>Email:</strong> <span>worldvoiceandarts@gmail.com</span></p>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">WVAAE</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href=# >WVAAE Team</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>