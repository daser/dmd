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
                                                <h5>Arrears Recording Form</h5>
                                                <!-- <div class="card-header-right">
                                                   <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Posts</button>
                                                </div> -->
                                            </div>
                                            <div class="card-block">
                                            <form method="post" action="{{ route('reports.index')}}" enctype="multipart/form-data">

                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-sm-6"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Debtor Details</label>
                                                        <!-- <input type="text" name="debtor" class="form-control" placeholder="debtor"> -->
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="yearly" value="{{ old('debtor')}}">
                                                            <option value="{{ old('debtor')}}">{{ old('debtor')}}</option>
                                                            <option value="">Select MDA (Debtor)</option>
                                                            @foreach($mdas as $new)
                                                            <option value="{{ $new->name }}">{{ $new->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Creditor Details</label>
                                                        <input type="text" name="creditor" class="form-control" placeholder="creditor" value="{{ old('creditor')}}">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Contract terms and penalties</label>
                                                        <textarea class="form-control" name="contract_terms" rows="3">{{ old('contract_terms')}}</textarea>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Contact Information</label>
                                                        <textarea class="form-control" name="contact" rows="3">{{ old('contact')}}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Effective/Billing Date</label>
                                                        <input type="date" name="billing_date" class="form-control" placeholder="billing date" value="{{ old('billing_date')}}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Date of Entry</label>
                                                        <input type="date" name="date_of_entry" class="form-control" value="{{ old('date_of_entry')}}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">(₦) Amount Settled/Part Paid</label>
                                                        <input type="text" name="amount_settled" class="form-control" placeholder="amount settled" value="{{ old('amount_settled')}}">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Nature of the Debt</label>
                                                        <!-- <input type="text" name="nature_of_debt" class="form-control" placeholder="nature of debt"> -->
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="nature_of_debt" value="{{ old('nature_of_debt')}}">
                                                            <option value="{{ old('nature_of_debt')}}">{{ old('nature_of_debt')}}</option>
                                                            <!-- <option value="">Select Nature of Debt</option> -->
                                                            @foreach($debts as $new)
                                                            <option value="{{ $new['nature_of_debt'] }}">{{ $new['nature_of_debt'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Arrears Type</label>
                                                        <!-- <input type="text" name="nature_of_debt" class="form-control" placeholder="nature of debt"> -->
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="arrears_type" value="{{ old('arrears_type')}}">
                                                            <option value="{{ old('arrears_type')}}">{{ old('arrears_type')}}</option>
                                                            <option value="outstanding">Outstanding</option>
                                                            <option value="incurred">Incurred</option>
                                                            <option value="settled">Settled</option>
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">(₦) Arrears Owed</label>
                                                        <input type="text" name="arrears_owed" class="form-control" placeholder="arrears owed" value="{{ old('arrears_owed')}}">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">File Reference</label>
                                                        <input type="text" name="file_reference" class="form-control" placeholder="File Reference" value="{{ old('file_reference')}}">
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Arrears Category</label>
                                                        <!-- <input type="text" name="economic_category" class="form-control" placeholder="News Title"> -->
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="economic_category" value="">
                                                            <option value="{{ old('economic_category')}}">{{ old('economic_category')}}</option>
                                                            <!-- <option value="">Select Arrears Category</option> -->
                                                            @foreach($categories as $new)
                                                            <option value="{{ $new->name }}">{{ $new->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">State of Arrears</label>
                                                        <!-- <input type="text" name="arrears_state" class="form-control" placeholder="News Title"> -->
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="arrears_state" value="">
                                                            <option value="{{ old('arrears_state')}}">{{ old('arrears_state')}}</option>
                                                            <!-- <option value="">Select State of Arrears record</option> -->
                                                            <option value="verified">Verified</option>
                                                            <option value="contested">Contested</option>
                                                            <option value="rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Comments, including note on risk of non-payment</label>
                                                        <textarea class="form-control" name="comments" rows="4">{{ old('comments')}}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm pull-right">Add arrears record</button>
                                                </form>
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