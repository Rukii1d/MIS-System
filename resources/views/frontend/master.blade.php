<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>MIS REDA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          <img src="assets/images/13.png" alt="">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#services">Services</a></li>
                          <li class="scroll-to-section"><a href="#about">About</a></li>

                          @if (session()->has('id'))
                          <li><a href="{{ URL::to('profile') }}">My Profile</a></li>
                          <li><a href="{{ URL::to('/reda') }}">REDA</a></li>
                          <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                          @else
                          
                  
                          <li><a href="{{ URL::to('/login') }}">Login</a></li>
                          <li><a href="{{ URL::to('/register') }}">Register</a></li>
                          @endif
          
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <div class="swiper-container" id="top">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url(assets/images/main.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>REDA <em>MIS</em> System<br>  
                  <div class="div-dec"></div>
                  <p>Welcome To Regional Economic Development Agency (REDA) MIS Site.</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="https://www.cs.cp.gov.lk/web/institutions/?id=13&lang=en">Discover More</a>
                    </div>
                    <div class="orange-button">
                      <a href="#">Contact Us</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url(assets/images/11.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text"><br>
                <br>
                <br>
                <br>
                <br>
                <h2><br><em>Regional Economic Development Agency</em>(REDA)<br> Central Province
                  <div class="div-dec"></div>
                  <p>The Regional Economic Development Agency (REDA) is a collaborative effort between the public and private sectors to foster development in Sri Lanka’s Central Province. Despite its abundant resources, the region contributes only 8% to the nation's GDP due to various challenges. REDA aims to overcome these obstacles and promote economic growth..</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="https://www.cs.cp.gov.lk/web/institutions/?id=13&lang=en">Discover More</a>
                    </div>
                    <div class="orange-button">
                      <a href="#">Contact Us</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="slide-inner" style="background-image:url(assets/images/black.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="header-text">
                  <h2>Sri Lankan Black<br> <em>Panther</em></h2>
                  <div class="div-dec"></div>
                  <p>The Sri Lankan black panther is a melanistic variant of the Sri Lankan leopard (Panthera pardus kotiya), the apex predator native to Sri Lanka. Melanism, a genetic mutation resulting in an excess of dark pigmentation, gives these leopards their distinctive black coats. Despite their dark appearance, the typical leopard rosettes and spots are still present but are masked by the dense black coloration.</p>
                  <div class="buttons">
                    <div class="green-button">
                      <a href="https://www.cs.cp.gov.lk/web/institutions/?id=13&lang=en">Discover More</a>
                    </div>
                    <div class="orange-button">
                      <a href="#">Contact Us</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>

  <!-- ***** Main Banner Area End ***** -->

  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-archive"></i>
            <h4>REDA Manpower</h4>
            <p>REDA Manpower offers trusted cleaning and security services, ensuring safe and hygienic environments for all sectors.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-cloud"></i>
            <h4>Busniess Plan</h4>
            <p>Helping businesses grow with expert planning support.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-charging-station"></i>
            <h4>Event Management</h4>
            <p></p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-suitcase"></i>
            <h4>Training Programs</h4>
            <p>Skill-building sessions to empower local workforce.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-archway"></i>
            <h4>Courses</h4>
            <p>Quality education programs to enhance knowledge and skills.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="service-item">
            <i class="fas fa-puzzle-piece"></i>
            <h4>Business Advice</h4>
            <p>Expert guidance to help businesses succeed and grow.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <h4>"Empowering Regional<em>Growth </em> through Business <strong>Solutions with </strong>REDA"</h4>
        </div>
        <div class="col-lg-7">
          <div class="buttons">
            <div class="green-button">
              <a href="https://www.cs.cp.gov.lk/web/institutions/?id=13&lang=en">Discover More</a>
            </div>
            <div class="orange-button">
              <a href="#">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about-us" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>About Us</h6>
            <h4>Know Us Better</h4>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="active gradient-border"><span>Web Design</span></div>
                    <div class="gradient-border"><span>Graphics</span></div>
                    <div class="gradient-border"><span>Web Coding</span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Deadline</span>
                          <span class="title">Client</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Website Redesign</span>
                          <span class="item">$1,500 to $2,200</span>
                          <span class="item">2022 Dec 12</span>
                          <span class="item">Web Biz</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Website Renovation</span>
                          <span class="item">$2,500 to $3,600</span>
                          <span class="item">2022 Dec 10</span>
                          <span class="item">Online Ads</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Marketing Plan</span>
                          <span class="item">$2,500 to $4,200</span>
                          <span class="item">2022 Dec 8</span>
                          <span class="item">Web Biz</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">All-new Website</span>
                          <span class="item">$3,000 to $6,600</span>
                          <span class="item">2022 Dec 2</span>
                          <span class="item">Web Presence</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Deadline</span>
                          <span class="title">Client</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Graphics Redesign</span>
                          <span class="item">$500 to $800</span>
                          <span class="item">2022 Nov 24</span>
                          <span class="item">Media One</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Digital Graphics</span>
                          <span class="item">$1,500 to $3,000</span>
                          <span class="item">2022 Nov 18</span>
                          <span class="item">Second Media</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">New Artworks</span>
                          <span class="item">$2,200 to $4,400</span>
                          <span class="item">2022 Nov 10</span>
                          <span class="item">Artwork Push</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">Complex Arts</span>
                          <span class="item">$1,100 to $2,400</span>
                          <span class="item">2022 Nov 3</span>
                          <span class="item">Media One</span>
                        </div>
                    </li>
                    <li>
                      <div>
                        <div class="main-list">
                          <span class="title">Project Title</span>
                          <span class="title">Budget</span>
                          <span class="title">Estimated</span>
                          <span class="title">Technology</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Backend Coding</span>
                          <span class="item">$2,000 to $5,000</span>
                          <span class="item">2022 Nov 28</span>
                          <span class="item">PHP MySQL</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">New Web App</span>
                          <span class="item">$1,500 to $3,000</span>
                          <span class="item">2022 Nov 18</span>
                          <span class="item">Python Programming</span>
                        </div>
                        <div class="list-item">
                          <span class="item item-title">Frontend Interactions</span>
                          <span class="item">$3,000 to $6,000</span>
                          <span class="item">2022 Nov 10</span>
                          <span class="item">JavaScripts</span>
                        </div>
                        <div class="list-item last-item">
                          <span class="item item-title">Video Creations</span>
                          <span class="item">$1,800 to $4,400</span>
                          <span class="item">2022 Nov 3</span>
                          <span class="item">Multimedia</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="right-content">
            <h4></h4>
            <p> <b></b> <br><br></p>
            <div class="green-button">
              <a href="about-us.html">Discover More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="calculator">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="left-image">
            <img src="assets/images/calculator-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6></h6>
            <h4>Get a Financial Plan</h4>
          </div>
          <form id="calculate" action="" method="get">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <label for="name">Your Name</label>
                  <input type="name" name="name" id="name" placeholder="" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="email">Your Email</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" id="subject" placeholder="" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="chooseOption" class="form-label">Your Reason</label>
                  <select name="Category" class="form-select" aria-label="Default select example" id="chooseOption" onchange="this.form.click()">
                      <option selected>Choose an Option</option>
                      <option type="checkbox" name="option1" value="Online Banking">Business Advice</option>
                      <option value="Financial Control">Business plan</option>
                      <option value="Yearly Profit">Training Program</option>
                      <option value="Crypto Investment">Courses</option>
                      <option value="Crypto Investment">Event Management</option>
                      <option value="Crypto Investment">Poject Prposal</option>
                      <option value="Crypto Investment">Man Power Services</option>



                  </select>
              </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Submit Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>Quotes</h6>
            <h4></h4>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>"Economics is everywhere, and understanding economics can help you make better decisions and lead a happier life."</p>
              <h4>Tyler Cowen</h4>
              <span> an American economist </span>
              <div class="right-image">
                <img src="assets/images/testimonials-01.jpeg" alt="">
              </div>
            </div>
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>"Wealth consists not in having great possessions, but in having few wants."</p>
              <h4>Epictetus</h4>
              <span>Greek Stoic philosopher</span>
              <div class="right-image">
                <img src="assets/images/r.jpeg" alt="">
              </div>
            </div>
            <div class="item">
              <i class="fa fa-quote-left"></i>
              <p>"Economics is extremely useful as a form of employment for economists."</p>
              <h4>John Kenneth Galbraith</h4>
              <span>Canadian-American economist</span>
              <div class="right-image">
                <img src="assets/images/y.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="partners">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
        <div class="col-lg-2 col-sm-4 col-6">
          <div class="item">
            <img src="assets/images/13.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2025 All Rights Reserved. 
          
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

      var swiperOptions = {
        loop: true,
        speed: 1000,
        grabCursor: true,
        watchSlidesProgress: true,
        mousewheelControl: true,
        keyboardControl: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          progress: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }      
          },
          touchStart: function() {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },
          setTransition: function(speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          }
        }
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
  </body>
</html>