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
  <link href="{{ asset('frontend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('frontend/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

   <link href="{{ asset('frontend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->

   <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
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
        <i class="fa fa-envelope-o"></i> <a href="#">contact@example.com</a>
        <i class="fa fa-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
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

  <main id="main">



 



    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Your Financial Arrears<a href="{{ url()->previous() }}">
                            <button class="btn btn-info btn-sm">
                                <span class="fa fa-eye-open"><h6>Click to go Back</h6></span>
                            </button>
                            </a> </h2> 

          <p>For suggestions and questions, Kindly drop your comments below..</p>
        </div>
        <div class="row">
        <div class="col-md-8">
        <div class="card-block">
    
            <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Debtor Details</label>
                    <input type="text" name="debtor" class="form-control" value="{{ $arrear->debtor }}" readonly>
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Creditor Details</label>
                    <input type="text" name="creditor" class="form-control" value="{{ $arrear->creditor }}" readonly>
                </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Contract terms and penalties</label>
                    <textarea class="form-control" name="contract_terms" rows="3" readonly>{{ $arrear->contract_terms }}</textarea>
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact Information</label>
                    <textarea class="form-control" name="contact" rows="3" readonly>{{ $arrear->contact }}</textarea>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Effective/Billing Date</label>
                    <input type="date" name="billing_date" class="form-control" readonly value="{{ $arrear->billing_date }}">
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount Settled/Part Paid</label>
                    <input type="text" name="amount_settled" class="form-control" readonly value="₦ {{ number_format($arrear->amount_settled, 2) }}">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Nature of the Debt</label>
                    <input type="text" name="nature_of_debt" class="form-control" readonly value="{{ $arrear->nature_of_debt }}">
                </div>
                </div>

                <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Arrears Owed</label>
                    <input type="text" name="arrears_owed" class="form-control" readonly value="₦ {{ number_format($arrear->arrears_owed, 2) }}">
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">File Reference</label>
                    <input type="text" name="file_reference" class="form-control" readonly value="{{ $arrear->file_reference }}">
                </div>
                </div>

                <div class="col-sm-4"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Economic Category</label>
                    <input type="text" name="economic_category" class="form-control" readonly value="{{ $arrear->economic_category }}">
                </div>
                </div>

                <div class="col-sm-4"> 
                <div class="form-group">
                    <label for="exampleInputPassword1">State of Arrears</label>
                    <input type="text" name="arrears_state" class="form-control" readonly value="{{ $arrear->arrears_state }}">
                </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Comments, including note on risk of non-payment</label>
                    <textarea class="form-control" name="comments" rows="4" readonly>{{ $arrear->comments }}</textarea>
                </div>
                </div>
            </div>
            <!-- <button type="submit" class="btn btn-primary btn-sm pull-right">Add arrears record</button> -->
            </form>

        </div>
        </div>


        <div class="col-md-4">
            <hr />
            <h5>Recent Comments</h5>
            @include('admin.arrears.comments', ['comments' => $comments, 'arrear_id' => $arrear->id])
            <hr />
            <h5>Add comment</h5>
            <form method="post" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="body"></textarea>
                    <input type="hidden" name="arrear_id" value="{{ $arrear->id }}" />
                </div>
                <div class="form-group">
                    <input id="fileup" type="hidden" class="form-control" name="hiddenDebtor" value="{{ $arrear->debtor }}">
                    <input id="fileup" type="hidden" class="form-control" name="hiddenCreditor" value="{{ $arrear->creditor }}">
                    <input id="fileup" type="hidden" class="form-control" name="hidenID" value="{{ $arrear->id }}">

                    <input id="fileup" type="file" class="form-control" name="image_file">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="Add Comment" />
                </div>
            </form>
        </div>
        {{ $comments->links() }}
        </div>
      </div>
  
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
  <script src="{{ asset('frontend/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/easing/easing.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{ asset('frontend/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/wow/wow.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/magnific-popup/magnific-popup.min.js')}}"></script>
  <script src="{{ asset('frontend/lib/sticky/sticky.js')}}"></script>

</body>
</html>
