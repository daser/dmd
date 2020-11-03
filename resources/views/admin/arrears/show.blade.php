@extends('admin.layouts.main')

@section('content')

  @include('admin.partials.loader')

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

      @include('admin.partials.navbar')
     
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            @include('admin.partials.sidebar')

            <div class="pcoded-content">

                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="feather icon-watch bg-c-blue"></i>
                                <div class="d-inline">
                                    <h5>Arrears Recording page</h5>
                                    <span>Arrears Recording Create</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class=" breadcrumb breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#!">Arrears Recording</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-body">
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif 
                            @if(session()->get('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}  
                            </div>
                            @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Arrears Record Sheet</h5>
                                                <!-- <div class="card-header-right">
                                                   <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Posts</button>
                                                </div> -->
                                            </div>
                                            <div class="card-block">
                                            @foreach($arrear as $modal)
                                            <form method="post" action="" enctype="multipart/form-data">

                                                <!-- {{ csrf_field() }} -->
                                                <div class="row">
                                                    <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Debtor Details</label>
                                                        <input type="text" name="debtor" class="form-control" value="{{ $modal->debtor }}" readonly>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Creditor Details</label>
                                                        <input type="text" name="creditor" class="form-control" value="{{ $modal->creditor }}" readonly>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Contract terms and penalties</label>
                                                        <textarea class="form-control" name="contract_terms" rows="3" readonly>{{ $modal->contract_terms }}</textarea>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Contact Information</label>
                                                        <textarea class="form-control" name="contact" rows="3" readonly>{{ $modal->contact }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Effective/Billing Date</label>
                                                        <input type="date" name="billing_date" class="form-control" readonly value="{{ $modal->billing_date }}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Date of entry</label>
                                                        <input type="date" name="billing_date" class="form-control" readonly value="{{ $modal->date_of_entry }}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Amount Settled/Part Paid</label>
                                                        <input type="text" name="amount_settled" class="form-control" readonly value="₦ {{ number_format($modal->amount_settled, 2) }}">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Nature of the Debt</label>
                                                        <input type="text" name="nature_of_debt" class="form-control" readonly value="{{ $modal->nature_of_debt }}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Arrears Owed</label>
                                                        <input type="text" name="arrears_owed" class="form-control" readonly value="₦ {{ number_format($modal->arrears_owed, 2) }}">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">File Reference</label>
                                                        <input type="text" name="file_reference" class="form-control" readonly value="{{ $modal->file_reference }}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Arrears Category</label>
                                                        <input type="text" name="economic_category" class="form-control" readonly value="{{ $modal->economic_category }}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">State of Arrears</label>
                                                        <input type="text" name="arrears_state" class="form-control" readonly value="{{ $modal->arrears_state }}">
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Comments, including note on risk of non-payment</label>
                                                        <textarea class="form-control" name="comments" rows="4" readonly>{{ $modal->comments }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- <button type="submit" class="btn btn-primary btn-sm pull-right">Add arrears record</button> -->
                                                </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="styleSelector">
            </div>

        </div>
    </div>

@endsection