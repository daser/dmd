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
          <li><a href="https://forms.gle/ZNMrKUeESk8y8h5H6" target="_blank">Complaints</a></li>
          <li><a href="https://debtmanagement.plateaustate.gov.ng/">Debt Management Office</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

 

  <main id="main">


  


    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Confirm the State of Your Arrears </h2>
          <p>Type in your file reference number, creditor or debtor name in to the search input to verify your status</p>
            <hr>
          <div class="card-block">
                <div class="dt-responsive table-responsive">
                <table id="example" class="table table-striped table-bordered table-sm nowrap">
                    <thead>
                    <tr>
                    <!-- <th>S/N</th> -->
                    <th>File No:</th>
                    <th>Debtor</th>
                    <th>Creditor</th>
                    <th>Arrears Owed</th>
                    <th>Billing Date</th>
                    <!-- <th>File Reference</th> -->
                    <!-- <th>Arrears State</th> -->
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($datas) > 0)
                    @foreach($datas as $data)
                    <tr>
                        <!-- <td>{{ ++$i }}</td> -->
                        <td>{{ $data->file_reference }}</td>
                        <td>{{ $data->debtor }}</td>
                        <td>{{ $data->creditor }}</td>
                        <td>₦ {{ number_format($data->arrears_owed, 2) }}</td>
                        <td>{{ $data->billing_date }}</td>
                        
                        <!-- <td>{{ $data->arrears_state }}</td> -->
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
                    <!-- <th>S/N</th> -->
                    <th>File No:</th>
                    <th>Debtor</th>
                    <th>Creditor</th>
                    <th>Arrears Owed</th>
                    <th>Billing Date</th>
                    
                    <!-- <th>Arrears State</th> -->
                    <th>Actions</th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>

      </div>
    </section><!-- #services -->

 



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
