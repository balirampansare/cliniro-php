
<?php
session_start();

include('./doctor/include/config.php');
error_reporting(0);

    if(isset($_POST['submit']))
  {

    $typeofreg = $_POST['typeofreg'];
    $name = $_POST['name'];
    $timing = $_POST['timing'];
    $close = $_POST['closed'];
    $locality = $_POST['locality'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $website = $_POST['website'];

    $query=mysqli_query($con, "insert into  inventory(Type,Name,Timing,Closed,Locality,City,Address,Contact,Website)values('$typeofreg','$name','$timing','$close','$locality','$city','$address','$contact','$website')");
    if ($query) {
    
      echo '<script>alert("Details Added Successfully")</script>';
      echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cliniro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo copy.svg" rel="icon">
  <!--link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex">
        <img src="assets/img/logo copy.svg" alt="">
        <h1><a href="index.html" class="mx-2"> Cliniro</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Features</a></li>
          <!--li><a class="nav-link scrollto" href="#team">Team</a></li-->
          <!--li><a class="nav-link scrollto" href="#pricing">Pricing</a></li-->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a href="doctor/doctorlogin.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>You Care For Patients <br> We Care For You...</h1>
      <h5><i>Join us in our mission to revolutionize clinic management and bring about a healthier, happier world.</i></h5>
      
      <a href="doctor/doctorlogin.php" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2>About Us</h2>
          
        </div>

        <div class="row content">
          
          <div class="col-lg-12 pt-4 pt-lg-0">
            
            
            <p class="fst-italic" style="text-align: justify;">
              At <span style="color:rgb(27, 125, 134)"><b>CLINIRO</b></span>, we are dedicated to providing top-notch services that empower healthier lives. 
              We understand the importance of efficient clinic management, which is why we have developed a platform that caters 
              to the needs of both patients and healthcare providers. Our goal is to create a seamless experience for all 
              parties involved, whether it's booking appointments, managing patient records, or streamlining communication.
              We strive to make healthcare accessible to everyone, and our commitment to innovation and technology ensures that our services are always up-to-date and user-friendly. 
              Join us in our mission to revolutionize clinic management and bring about a healthier, happier world.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Features</h2>
          <!--p>Magnam dolores commodi suscipit eius consequatur ex aliquid</p-->
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="">Electronic Health Record</a></h4>
            <p class="description">As we know paper gets damaged over a period of time, & the same is the case with manual records. 
              In the healthcare sector, it is very important to keep a note of the medical history of the patient to diagnose his/her problems appropriately and in less time. </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h4 class="title"><a href="">Appointment Management</a></h4>
            <p class="description">The two most common problems faced by clinics today are booking and scheduling appointments. Cliniro makes it easy for a doctor or clinic staff to easily manage patient’s appointments.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-cash"></i></div>
            <h4 class="title"><a href="">Billing and Accounting</a></h4>
            <p class="description">Like any other business, revenue generation & increased productivity is the main point here. Although a doctor saves a life, in the end, it’s a business. Proper accounting & easy billing is what it takes for increased productivity.</p>
          </div>
          
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-bar-chart"></i></div>
            <h4 class="title"><a href="">Insights Generation & Visualization</a></h4>
            <p class="description">Data is fundamentally useless without analytics.Cliniro provides data visualizations for the insights generated from the clinic data like monthly
               generated revenue, number of patients treated on a monthly basis and rating by the patients.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-calendar4-week"></i></div>
            <h4 class="title"><a href="">Be Updated</a></h4>
            <p class="description">Who don't like being updated on the latest things happening! Cliniro displays medical 
              related news throughout the world. </p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-binoculars"></i></div>
            <h4 class="title"><a href="">Inventory</a></h4>
            <p class="description">Want to search for other health related services, then we are here with our inventory. The inventory contains contact details of medical assistance like blood banks, pharmacy, pathology labs, other clinics, hospitals and ambulance services.</p>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

   

    <!-- ======= Testimonials Section ======= -->
    <!--section id="testimonials" class="testimonials">
      <div class="container position-relative">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>

   

   
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>

        </div>

        <div class="row justify-content-center">

          

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Vaishnavi Kulkarni</h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/baliupdate.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Baliram Pansare</h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Mrunmai Patil</h4>
                
              </div>
            </div>
          </div>

        </div>

      </div>
    </section-->

    <!-- ======= Pricing Section ======= -->
    <!--section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section--><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!--section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row  d-flex align-items-stretch">

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Non consectetur a erat nam at lectus urna duis?</h4>
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?</h4>
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus.
            </p>
          </div>

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h4>
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
            </p>
          </div>

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h4>
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>

          <div class="col-lg-6 faq-item">
            <i class="bx bx-help-circle"></i>
            <h4>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?</h4>
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
            </p>
          </div>

        </div>

      </div>
    </section--><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="getregistered" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Get Registered</h2>
          <p>Fill out the below form to get reach out by our doctors and patients.</p>
        </div>
      </div>
      
      <div class="container">
        

        <div class="row mt-2 justify-content-center">
          <div class="col-lg-10" style="background-color:white;box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);">
         
            <div class="info">
              <form method="post" name="submit">
                <div class="row jumbotron  rounded py-2">
                    <div class="col-sm-5 form-group text-center  m-auto">
                      <label for="typeofreg">Select Type</label>
                      <select name="typeofreg" id="typeofreg" class="form-control browser-default custom-select">
                        <option value="Ambulance">Ambulance</option>
                        <option value="Blood Bank">Blood Bank</option>
                        <option value="Hospital">Hospital</option>
                        <option value="Laboratory">Laboratory</option>
                        <option value="Medical">Medical</option>
                        
                        
                      </select>
                    </div>
                        <div class="col-sm-12 form-group">
                            <label for="name" class="fw-semibold">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                          <label for="timing" class="fw-semibold">Timing:</label>
                          <input type="text" class="form-control" name="timing" id="timing" placeholder="Timing">
                      </div>
                        <div class="col-sm-6 form-group">
                            <label for="closed" class="fw-semibold">Closed:</label>
                            <input type="text" class="form-control" name="closed" id="closed" placeholder="Closed on">
                        </div>
                        <div class="col-sm-6 form-group">
                          <label for="locality" class="fw-semibold">Locality:</label>
                          <input type="text" class="form-control" name="locality" id="locality" placeholder="Locality">
                      </div>
                        <div class="col-sm-6 form-group">
                            <label for="city" class="fw-semibold">City:</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                        </div>
                        
                        <div class="col-sm-12 form-group">
                            <label for="address" class="fw-semibold">Address:</label>
                            <textarea class="form-control border-bottom" name="address" id="address" placeholder="Address" cols="30" rows="2" required></textarea>
                        </div>
                        <div class="col-sm-5 form-group">
                            <label for="contact" class="fw-semibold">Contact:</label>
                            <input type="text" class="form-control" name="contact" pattern="[1-9]{1}[0-9]{9}" id="contact" placeholder="Contact">
                        </div>
                        <div class="col-sm-7 form-group">
                            <label for="website" class="fw-semibold">Website:</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                        </div>
                        <div class="col-sm-12 form-group mt-1">
                            <button type="submit" name="submit"  class="btn btn-outline-success float-end">Submit</button>
                        </div>

                </div>
    
            </form>
              

            </div>

          
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          
        </div>
      </div>
     
      <div class="container">
        <div class="row mt-2 justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>K.C.College Engineering, Kopri, 400 603 Thane (E)</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>cliniro@gmail.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+91 7738986554<br>+91 9869464969</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        



      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

        <div class="container footer-bottom clearfix ">
      <div class="copyright">
        &copy; Copyright <strong><span>Cliniro</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       <p>cliniro@gmail.com</p>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>