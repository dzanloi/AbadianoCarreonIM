<?php 
  session_start();
  include 'php/connect.php';
  ?>

<!DOCTYPE html>

<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Teknopidu</title>
      
      <!-- Favicon -->
      <link rel="icon" href="dogpaw.ico" >
      
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

      <!-- CSS stylesheets -->
      <link rel="stylesheet" href="css/index.css">

      <!-- Font Awesome -->
      <script src="https://kit.fontawesome.com/218aac7a32.js" crossorigin="anonymous"></script>

      <!-- Google Fonts -->
      <link
          href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;900&family=Ubuntu:wght@300;400;500;700&display=swap"
          rel="stylesheet">
      <link
          href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@500&family=PT+Sans:wght@400;600;700&family=Rubik:wght@400;500&display=swap"
          rel="stylesheet">
      <link
          href="https://fonts.googleapis.com/css2?family=Edu+QLD+Beginner:wght@400;700&family=Edu+SA+Beginner:wght@400;700&family=Edu+TAS+Beginner:wght@400;600&display=swap"
          rel="stylesheet">

  </head>

  <body>

      <section class="landing-section" id="title" style="background-color: #ff4c68; 
                                                        color: #FFF; 
                                                        background: url('images/bakground.jpg'); 
                                                        background-size: cover;
                                                        background-repeat: no-repeat;
                                                        height: 100vh;">
          <div class="container-fluid">

              <!-- Nav Bar -->
              <nav class="navbar  navbar-expand-lg navbar-dark">
                  <!-- Brand Name -->
                  <a class="navbar-brand" href="#testimonials"><img src="images/cit-logo.png" class="logo" alt="cit logo"> teknopidu </a>
                  <!-- Dropdown Button -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"            data-bs-target="#navbarNavDropdown"
                      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle  navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <!--Navbar Items-->
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav ms-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="#footer"> <i class="fas fa-home fa-sm fa-fw"></i></a>
                          </li>
                          <div class="vr"></div>
                          <li class="nav-item">
                              <a class="nav-link" href="#pricing"> About Us</a>    
                          </li>
                          <div class="vr"></div>
                          <li class="nav-item">
                              <a class="nav-link" href="#cta"> <i class="fas fa-download fa-sm fa-fw "></i></a>
                          </li>
                      </ul>
                  </div>
              </nav>

              <!-- Title -->

              <div class="row">
                  <!--Title Text-->
                  <div class="col-lg-6">
                      <h1 class="big-heading" style="text-shadow:
                                                    -1px -1px 0 #000,
                                                    1px -1px 0 #000,
                                                    -1px 1px 0 #000,
                                                    1px 1px 0 #000;">Spark a connection with someone special here in CIT-U!!</h1>
                      <!-- Register Buttons -->
                      <a href="register.php"><button type="button" class="btn btn-dark btn-lg download-button"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</button></a>
                      <a href="login.php"><button type="button" class="btn btn-outline-light btn-lg download-button"><i class="fas fa-sign-in-alt fa-sm fa-fw"></i> Log in</button></a>
                  </div>
                  <!--Title Image-->
                  <div class="col-lg-6" >
                      <!-- <img src="images/citlandingstudents.png" class="students" alt=""> -->
                      <!-- <img src="images/citlandingstudents.png" class="title-image img" alt="iphone-mockup">     -->
                  </div>
              </div>

          </div>

    </section>

    <!-- Features -->

    <section class="white-section"  id="features">

      <div class="container-fluid">

        <div class="row">
          <!-- Column 1 -->
          <div class="col-lg-4 feature-box">
            <i class="fa-solid fa-circle-check fa-4x feature-icon "></i>
            <h3 class="feature-heading">Easy to use.</h3>
            <p class="feature-text">So easy to use, even your dog could do it.</p>
          </div>
          <!-- Column 2 -->
          <div class="col-lg-4  feature-box">
            <i class="fa-solid fa-bullseye fa-4x feature-icon"></i>
            <h3 class="feature-heading">Flexible</h3>
            <p class="feature-text">We have the all-rounder clients from all rograms here in CIT-U.</p>
          </div>
          <!-- Column 3 -->
          <div class="col-lg-4  feature-box">
            <i class="fa-solid fa-heart fa-4x feature-icon"></i>
            <h3 class="feature-heading">Guaranteed to work.</h3>
            <p class="feature-text">Find the love of your life or your money back.</p>
          </div>
        </div>

      </div>

    </section>


    <!-- Testimonials -->

    <section class="colored-section" id="testimonials">

      <!-- Carousel -->
      <div id="testimonial-carousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="2500" data-bs-pause="hover">

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
          <!-- Slide 1 -->
          <button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
          <!-- Slide 2 -->
          <button type="button" data-bs-target="#testimonial-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <!-- Carousel Content -->
        <div class="carousel-inner">
          <!-- Item 1 -->
          <div class="carousel-item active container-fluid"</div>
            <h2 class="testimonial-text">"I no longer have to wander other dating apps for love. I've found the hottest Technologian on Teknopidu, All hail!"</h2>
            <img src="images/darwin.jpg" class="testimonial-image" alt="dog-profile">
            <em class="testimonial-name">Darwin Darryl Largoza</em>
          </div>
          <!-- Item 2 -->
          <div class="carousel-item container-fluid">
            <h2 class="testimonial-text">"I used to be so lonely, but with teknopidu's help, I've found the love of my life."</h2>
            <img class="testimonial-image" src="images/nico.jpg" alt="lady-profile">
            <em class="testimonial-name">Nicolas Abadanio</em>
          </div>
        </div>

        <!-- Carousel Controls -->
        <div class="carousel-controls">
          <!-- Previous Button -->
          <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="prev">
            <span class="fa-solid fa-3x fa-circle-chevron-left control-icon"></span>
          </button>
          <!-- Next Button -->
          <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel" data-bs-slide="next">
            <span class="fa-solid fa-3x fa-circle-chevron-right control-icon"></span>
          </button>
        </div>

      </div>

    </section>

    <!-- Press -->

    <section class="colored-section" id="press">

      <!-- Press Logos -->
      <img class="press-logo" src="images/techcrunch.png" alt="tc-logo">
      <img class="press-logo" src="images/tnw.png" alt="tnw-logo">
      <img class="press-logo" src="images/bizinsider.png" alt="biz-insider-logo">
      <img class="press-logo" src="images/mashable.png" alt="mashable-logo">

    </section>


    <!-- Pricing -->

    <section class="white-section" id="pricing">
      
      <div class="container-fluid" >
        
        <!-- Price Heading -->
        <h2 class="section-heading">In Shop</h2>
        <p >Simple and affordable price plans for your full match potentials</p>

        <!-- Price Cards --->
        <div class="row row-cols-lg-3 row-cols-md-3 row-cols-1 g-3 ">

        <!-- Coloumn 1 -->
          <div class=" price-col col col-lg-4 col-md-4 col-sm-6 ">
          <!-- Card -->
            <div class="card border-light bg-light h-100">
              <!-- Card Header -->
              <div class="card-header border-dark">
                <h3 class=" price-title " >Tansan</h3>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <h2 class="price-text" >Free</h2>
                <p>5 Matches Per Day</p>
                <p>10 Messages Per Day</p>
                <p>Unlimited App Usage</p>
                <button type="button" class="w-100 price-btn btn btn-block btn-outline-dark btn-lg"> Sign Up for free </button>
              </div>
            </div>
          </div>

          <!-- Coloumn 2 -->
          <div class=" price-col col col-lg-4 col-md-4 col-sm-6">
            <!-- Card -->
            <div class="card border-light bg-light h-100">
              <!-- Card Header -->
              <div class="card-header border-dark">
                <h3 class=" price-title " >Silver</h3>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <h2 class="price-text" >₱49 / mo</h2>
                <p>Unlimited Matches</p>
                <p>Unlimited Messages</p>
                <p>Unlimited App Usage</p>
                <button type="button" class=" w-100 price-btn btn btn-block btn-dark btn-lg"> Get started </button>
              </div>
            </div>
          </div>

          <!-- Coloumn 3 -->
          <div class=" price-col col col-lg-4 col-md-4 col-sm-12 ">
            <!-- Card -->
            <div class="card border-light bg-light h-100">
              <!-- Card Header -->
              <div class="card-header border-dark">
                <h3 class=" price-title " >Gold</h3>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <h2 class="price-text" >₱99 / mo</h2>
                <p>Unlimited Matches</p>
                <p>Unlimited Messages</p>
                <p>Unlimited App Usage</p>
                <button type="button" class=" w-100 price-btn btn btn-block btn-dark btn-lg"> Contact us </button>
              </div>
            </div>
          </div> 

        </div>
          
      </div>    

    </section>


    <!-- Call to Action -->

    <section class="colored-section" id="cta">

      <div class="container-fluid" >

        <!-- CTA Heading -->
        <h3 class="big-heading">Find the one True Lo<i class="fa-solid fa-heart"></i>e at CIT-U Today</h3>
        
        <!-- Download Buttons -->
        <button type="button" class=" btn btn-dark btn-lg download-button"><i class="fa-brands   fa-apple"></i> Download </button>
        <button type="button" class=" btn btn-outline-light btn-lg download-button"> <i class="fa-brands fa-google-play"></i> Download </button>

      </div>
      

    </section>


    <!-- Footer -->

    <footer class="white-section" id="footer">

      <div class="container-fluid">

        <!-- Twitter Icon -->
        <a href="#" alt="twitter-icon"><i class="fa-brands fa-twitter footer-icon"></i></a>
        <!-- Facebook Icon -->
        <a href="#" alt="facebook-icon"><i class="fa-brands fa-facebook footer-icon"></i></a>
        <!-- Instagram Icon -->
        <a href="#" alt="instagram-icon"><i class="fa-brands fa-instagram footer-icon"></i></a>
        <!-- Envelope Icon -->
        <a href="#" alt="envelope-icon"><i class="fa-solid fa-envelope footer-icon"></i></a>
        <!-- Copyright -->
        <p class="footer-text">Made by <br> John Loi Carreon <br> Jan Edward Abadiano</p>
        
      </div>
      

    </footer>


  </body>

</html>