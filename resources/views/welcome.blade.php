<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Finance Debt Management Department</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="Plateau State Finance Ministry - Debt management Department" name="description">

  <!-- Favicons -->
  <link href="https://finance.plateaustate.gov.ng/wp-content/uploads/2019/09/mof-e1569926458948.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="frontend/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="frontend/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="frontend/lib/animate/animate.min.css" rel="stylesheet">
  <link href="frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="frontend/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

   <link href="frontend/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->

   <link href="frontend/css/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="#">debtmanagement@plateaustate.gov.ng</a>
        <i class="fa fa-phone"></i> +234 901 661 1687
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <!-- <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1> -->
        <img src="https://finance.plateaustate.gov.ng/wp-content/uploads/2019/09/mof-e1569926458948.png" style="width: 80px; height: 60px;" alt="logo.png">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Home</a></li>
          <li><a href="#services">Arrears</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-content">
      <h2>Know <span>your Arrears</span> Today!</h2>
      <div>
        <a href="#services" class="btn-get-started scrollto">Get Started</a>
        <a href="#contact" class="btn-projects scrollto">Contact Us</a>
      </div>
    </div>

    <div id="intro-carousel" class="owl-carousel" >
      <div class="item" style="background-image: url('https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.nasco.net%2Fmedia%2Fpage%2Fjos-1920x600.jpg&imgrefurl=https%3A%2F%2Fwww.nasco.net%2Fnews%2Fcity-state%2F&docid=60bpD2T8sWnW3M&tbnid=O9q3ZexqzR-syM%3A&vet=10ahUKEwjO9Mu_mLDlAhWktlkKHWzlBa4QMwheKBIwEg..i&w=1920&h=600&bih=678&biw=1301&q=images%20of%20jos&ved=0ahUKEwjO9Mu_mLDlAhWktlkKHWzlBa4QMwheKBIwEg&iact=mrc&uact=8');"></div>
      <div class="item" style="background-image: url('frontend/img/intro-carousel/2.jpg');"></div>
      <div class="item" style="background-image: url('frontend/img/intro-carousel/3.jpg');"></div>
      <div class="item" style="background-image: url('frontend/img/intro-carousel/4.jpg');"></div>
      <div class="item" style="background-image: url('frontend/img/intro-carousel/5.jpg');"></div>
    </div>

  </section><!-- #intro -->

  <main id="main">


    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container-fluid">
        <div class="section-header">
          <h2>Confirm the State of Your Arrears </h2>
          <!-- <p>Know and review all arrears for all MDA(s), Contractors and Clients</p> -->
            <hr>
          <div class="card-block">
                <div class="dt-responsive table-responsive">
                <table id="example" class="table table-striped table-bordered table-sm nowrap">
                    <thead>
                    <tr>
                    <th>S/N</th>
                    <th>Debtor</th>
                    <th>Creditor</th>
                    <th>Arrears Owed</th>
                    <th>Billing Date</th>
                    <th>File Reference</th>
                    <th>Arrears State</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($datas) > 0)
                    @foreach($datas as $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->debtor }}</td>
                        <td>{{ $data->creditor }}</td>
                        <td>{{ $data->arrears_owed }}</td>
                        <td>{{ $data->billing_date }}</td>
                        <td>{{ $data->file_reference }}</td>
                        <td>{{ $data->arrears_state }}</td>
                        <!-- <td>{{ $data->created_at->format('F d, Y h:ia') }}</td> -->

                        <td className="text-right">
                            <a href="{{route('show.arrears', $data->id)}}">
                            <button class="btn btn-info btn-sm">
                                <span class="fa fa-eye-open">View more</span>
                            </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                    <td colspan="8" class="text-center">
                        <h4 class="card-title">No Arrears Recorded.</h4>
                    </td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                    <tr>
                    <th>S/N</th>
                    <th>Debtor</th>
                    <th>Creditor</th>
                    <th>Arrears Owed</th>
                    <th>Billing Date</th>
                    <th>File Reference</th>
                    <th>Arrears State</th>
                    <th>Actions</th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center text-lg-left">
            <h3 class="cta-title">BRIEF ON THE PLATEAU STATE DEBT MANAGEMENT DEPARTMENT</h3>
            <p class="cta-text"> Following Nigeria’s exit from the Parish and London Club debt obligations, the Debt Management Office (DMO) developed the External Borrowing Guidelines (2008-2012), as well as the Subnational Borrowing Guidelines to guide the Federal and State Governments, as well as their Agencies towards external and domestic borrowings with a view to avoiding a relapse into debt unsustainability.</p>
          </div>
          <!-- <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div> -->
        </div>

      </div>
    </section><!-- #call-to-action -->



    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <!-- <p>Kindly reach out </p> -->
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Joseph Gomwalk | State Secretariate | Jos</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+234 901 661 1687">+234 901 661 1687</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">debtmanagement@plateaustate.gov.ng</a></p>
            </div>
          </div>

        </div>
      </div>

      <!-- <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div> -->

      <!-- <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> -->

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Ministry of finance</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        Designed by <a href="#">Pictda</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="frontend/lib/jquery/jquery.min.js"></script>
  <script src="frontend/lib/jquery/jquery-migrate.min.js"></script>
  <script src="frontend/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="frontend/lib/easing/easing.min.js"></script>
  <script src="frontend/lib/superfish/hoverIntent.js"></script>
  <script src="frontend/lib/superfish/superfish.min.js"></script>
  <script src="frontend/lib/wow/wow.min.js"></script>
  <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="frontend/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="frontend/lib/sticky/sticky.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function() {
            $('#example').DataTable();
        } );
  </script>

  <!-- Template Main Javascript File -->
  <script src="frontend/js/main.js"></script>

</body>
</html>
