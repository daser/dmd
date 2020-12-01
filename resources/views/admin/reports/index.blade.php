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
                                    <h5>Name of State: Plateau </h5>
                                    <span>Reporting Year: {{ date("Y") }}</span>
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
                                        <a href="#!">Arrears</a>
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
                                                <h5>State Domestic Arrears Stock Reporting</h5>
                                                <form method="get" action="{{ route('reports.index')}}" >
                                                {{ csrf_field() }} 
                                                <div class="row">
                                                    <div class="col-sm-4"> 
                                                    <div class="form-group">
                                                        <select class="form-control custom-select" id="inputGroupSelect01" name="year">
                                                             <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2019">2020</option>
                                                            <option value="2019">2021</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                <button type="submit" class="btn btn-primary btn-sm pull-right">View Reports</button>
                                    </form>
                                            </div>
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table style="font-size: 11px;" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>S/N <br><br><br><br><br><br><br></th>
                                                    <th>Arrears Type <br><br><br><br><br><br>In Naira</th>
                                                    <th>Outstanding <br> Arrears At <br> December 31 <br> 2017 (Stock)<br><br><br><br></th>
                                                    <th>New Arrears <br> Incurred in <br> 2018 (Flow)<br><br><br><br><br></th>
                                                    <th>Arrears <br> Settled (Paid) <br> In 2018 (Flow)<br><br><br><br><br></th>
                                                    <th>Outstanding <br> Arrears At <br> December 31 <br> 2018 (Stock)<br><br><br><br></th>
                                                    <th>New Arrears <br> Incurred In <br> 2019 (Flow)<br><br><br><br><br></th>
                                                    <th>Arrears <br> Settled (Paid) <br> In 2019 (Flow) <br><br><br><br><br></th>
                                                    <th>Outstanding <br> Arrears At <br> December 31, <br> 2019 (Stock)<br><br><br><br></th>
                                                    <th>Changes In <br> Arrears  <br> Between <br> December 31 <br> 2018 And <br> December 31 <br> 2019<br></th>
                                                    <th> % Changes In <br> Arrears  <br> Between <br> December 31 <br> 2018 And <br> December 31 <br> 2019</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Contractor's Arrears</td>
                                                        <td>₦ {{ isset($outstanding_2017) ? number_format($outstanding_2017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount2018) ? number_format($incurred_amount2018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount2018) ? number_format($settled_amount2018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount2018) ? number_format($outstanding_amount2018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount) ? number_format($incurred_amount, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount) ? number_format($settled_amount, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount) ? number_format($outstanding_amount, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total1_diff) ? number_format($total1_diff, 2) : "" }}</td>
                                                        <td>{{ isset($percentage1) ? round($percentage1, 2) : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Pension And Gratuity <br> Arrears</td>
                                                        <td>₦ {{ isset($outstanding_12017) ? number_format($outstanding_12017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount12018) ? number_format($incurred_amount12018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount12018) ? number_format($settled_amount12018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount12018) ? number_format($outstanding_amount12018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount1) ? number_format($incurred_amount1, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount1) ? number_format($settled_amount1, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount1) ? number_format($outstanding_amount1, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total2_diff) ? number_format($total2_diff, 2) : ""}}</td>
                                                        <td>{{ isset($percentage2) ? round($percentage2, 2) : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Salary Arrears And Other <br> Staff Claims Arrears</td>
                                                        <td>₦ {{ isset($outstanding_22017) ? number_format($outstanding_22017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount22018) ? number_format($incurred_amount22018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount22018) ? number_format($settled_amount22018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount22018) ? number_format($outstanding_amount22018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount2) ? number_format($incurred_amount2, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount2) ? number_format($settled_amount2, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount2) ? number_format($outstanding_amount2, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total3_diff) ? number_format($total3_diff, 2) : "" }}</td>    
                                                        <td>{{ isset($percentage3) ? round($percentage3, 2) : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <!-- <td>Other Arrears - Type X</td> -->
                                                        <td>Judgement Debt</td>
                                                        <td>₦ {{ isset($outstanding_32017) ? number_format($outstanding_32017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount32018) ? number_format($incurred_amount32018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount32018) ? number_format($settled_amount32018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount32018) ? number_format($outstanding_amount32018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount3) ? number_format($incurred_amount3, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount3) ? number_format($settled_amount3, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount3) ? number_format($outstanding_amount3, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total4_diff) ? number_format($total4_diff, 2) : "" }}</td>
                                                        <td>{{ isset($percentage4) ? round($percentage4, 2) : "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Other Arrears - Type Y</td>
                                                        <td>₦ {{ isset($outstanding_42017) ? number_format($outstanding_42017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount42018) ? number_format($incurred_amount42018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount42018) ? number_format($settled_amount42018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount42018) ? number_format($outstanding_amount42018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount4) ? number_format($incurred_amount4, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount4) ? number_format($settled_amount4, 2) : "" }}</td>
                                                        <td>₦ {{ isset($outstanding_amount4) ? number_format($outstanding_amount4, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total5_diff) ? number_format($total5_diff, 2) : "" }}</td>
                                                        <td>{{ isset($percentage5) ? round($percentage5, 2) : "" }}</td>
                                                    </tr>
                                                    <tr style="color: blue;">
                                                        <td></td>
                                                        <td><b>Total of all <br> Arrears Type</b></td>
                                                        <td>₦ {{ isset($outstanding_2017) + isset($outstanding_12017) + isset($outstanding_22017) + isset($outstanding_32017) + isset($outstanding_42017) ? number_format($outstanding_2017 + $outstanding_12017 + $outstanding_22017 + $outstanding_32017 + $outstanding_42017, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount2018) + isset($incurred_amount12018) + isset($incurred_amount22018) + isset($incurred_amount32018) + isset($incurred_amount42018) ? number_format($incurred_amount2018 + $incurred_amount12018 + $incurred_amount22018 + $incurred_amount32018 + $incurred_amount42018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount2018) + isset($settled_amount12018) + isset($settled_amount22018) + isset($settled_amount32018) + isset($settled_amount42018) ? number_format($settled_amount2018 + $settled_amount12018 + $settled_amount22018 + $settled_amount32018 + $settled_amount42018, 2) : ""}}</td>
                                                        <td>₦ {{ isset($outstanding_amount2018) + isset($outstanding_amount12018) + isset($outstanding_amount2018) + isset($outstanding_amount32018) + isset($outstanding_amount42018) ? number_format($outstanding_amount2018 + $outstanding_amount12018 + $outstanding_amount22018 + $outstanding_amount32018  + $outstanding_amount42018, 2) : "" }}</td>
                                                        <td>₦ {{ isset($incurred_amount) + isset($incurred_amount1) + isset($incurred_amount2) + isset($incurred_amount3) + isset($incurred_amount4) ? number_format($incurred_amount + $incurred_amount1 + $incurred_amount2 + $incurred_amount3 + $incurred_amount4, 2) : "" }}</td>
                                                        <td>₦ {{ isset($settled_amount) + isset($settled_amount1) + isset($settled_amount2) + isset($settled_amount3)  + isset($settled_amount4) ? number_format($settled_amount + $settled_amount1 + $settled_amount2 + $settled_amount3 + $settled_amount4, 2) : ""}}</td>
                                                        <td>₦ {{ isset($outstanding_amount) + isset($outstanding_amount1) + isset($outstanding_amount2) + isset($outstanding_amount3) + isset($outstanding_amount4) ? number_format($outstanding_amount + $outstanding_amount1 + $outstanding_amount2 + $outstanding_amount3 + $outstanding_amount4, 2) : "" }}</td>
                                                        <td>₦ {{ isset($total1_diff) + isset($total2_diff) + isset($total3_diff) + isset($total4_diff) + isset($total5_diff)? number_format($total1_diff + $total2_diff + $total3_diff + $total4_diff + $total5_diff , 2) : "" }}</td>
                                                        <td>{{ isset($percentage1) + isset($percentage2) + isset($percentage3) + isset($percentage4) + isset($percentage5) ? round($percentage1 + $percentage2 + $percentage3 + $percentage4 + $percentage5 , 2) : "" }}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
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
