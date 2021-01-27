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
                                    <h5>Search an arrear by reference number</h5>
                                    <span>Enter a reference number</span>
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
                                        <a href="#">Registered MDAs</a>
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

                                <div class="row">
                                    <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-block">
                                        
                                        
                                        <form method="POST" class="form-horizontal" action="{{ route('opr.search')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}              
                                            <div class="row">
                                                <div class="col-sm-2">   
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Reference No:</label>
                                                </div>
                                                </div>
                                                <div class="col-sm-6">   
                                                <div class="form-group">
                                                    <input type="text" name="searchbox" class="form-control" placeholder="Enter Reference No">
                                                </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        
                                        </form>
                                        </div>
                                        
                                    </div>

 @if(isset($datas))
                        <div class="card">
                                            <div class="card-header">
                                                <h5>Search result for <b> {{$searchParam}} </b></h5>
                                                <!-- <div class="card-header-right">
                                                   <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add User</button>
                                                </div> -->
                                            </div>
                                            
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                 <table  class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>Orig. Arrears Owed</th>
                                                    <th>Billing Date</th>
                                                    <th>Total Settled Amount</th>
                                                    <th>Last Settled Year</th>
                                                    <th>Last Settled Amount</th>
                                                    </tr>
                                                </thead>
                                                @if(count($datas) > 0)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $datas[0]->debtor }}</td>
                                                        <td>{{ $datas[0]->creditor }}</td>
                                                        <td>₦ {{ number_format($datas[0]->arrears_owed, 2) }}</td>
                                                        <td>{{ $datas[0]->billing_date }}</td>
                                                        <td>₦ {{ number_format($datas[0]->amount_settled,2) }}</td>
                                                        <td>{{ $datas[0]->year_of_entry }}</td>
                                                        <td>₦ {{ !empty($datas[0]->amount) ?  number_format($datas[0]->amount, 2) : "0" }}</td>
                                                        
                                                    </tr>
                                                    @else
                                                    <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h4 class="card-title">Arrears Not Recorded yet.</h4>
                                                    </td>
                                                    </tr>
                                                    @endif

                                                
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>Arrears Owed</th>
                                                    <th>Billing Date</th>
                                                    <th>Total Settled Amount</th>
                                                    <th>Last Settled Year</th>
                                                    <th>Last Settled Amount</th>
                                                    </tr>
                                                </tfoot>
                                                </table>
                                                @if(count($datas) > 0)
                                                <div>

                                                            <a href="{{route('arrears.show', $datas[0]->slug)}}">
                                                            <button class="btn btn-info btn-sm">
                                                                <span class="glyphicon glyphicon-eye-open"></span>
                                                            </button>
                                                            </a>
                                                            <a href="{{route('arrears.edit', $datas[0]->slug)}}">
                                                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{ $datas[0]->slug }}">
                                                                <span class="glyphicon glyphicon-edit"></span>
                                                            </button>
                                                            </a>
                                                            <a href="{{route('arrears.delete', $datas[0]->slug)}}">
                                                            <button class="btn btn-danger btn-sm">
                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                            </a>
<br />
<br />
<br />

                                                        <h3 style="color:red">Current Arrears Owed:<b> ₦ {{ number_format($datas[0]->arrears_owed - $datas[0]->amount_settled, 2) }}</b></h3>
                                            </div>
                                             @endif
<br />
@if(count($datas) > 0)
<div class="card">
                                            <div class="card-header">
                                                <h5>Enter settlement amount for <b>[{{ $datas[0]->file_reference }}]</b></h5>
                                                <!-- <div class="card-header-right">
                                                   <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add User</button>
                                                </div> -->
                                            </div>
                                        <div class="card-block" style="border:2px solid #c4c4c4">
                                                            <br />
                            
                                        
                                        <form method="POST" class="form-horizontal" action="{{ route('opr.store')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}              
                                            <div class="row">
                                                 <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Date of Entry</label>
                                                        <input type="date" name="date_of_entry" class="form-control" value="{{ old('date_of_entry')}}">
                                                    </div>
                                                    </div>
                                                <input type="hidden" value="{{ $datas[0] }}" name="DBpayload" />
                                                <div class="col-sm-4">   
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Amount:</label>
                                                
                                                    <input type="text" name="amountbox" class="form-control" placeholder="Enter Amount">
                                                </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Settle this amount</button>
                                        
                                        </form>
                                        </div>
                                        
                                    </div>
@endif
                                        </div>
                                    </div>
                                </div>
</div>


                                                
 @endif

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
