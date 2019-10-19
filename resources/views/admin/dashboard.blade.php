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
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Dashboard</h5>
                                            <span>Finance Debt Management Department</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a> </li>
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

                                            <div class="col-md-12 col-xl-9">
                                                <div class="card sale-card">
                                                    <div class="card-header">
                                                        <h5>Supports Messages</h5>
                                                    </div>
                                                    <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="order-table" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                            <th>No</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <th>No</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                        </table>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-3">
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">MDAs</h6>
                                                                <h3 class="f-w-700 text-c-blue"></h3>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-eye bg-c-blue"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Economic Categories</h6>
                                                                <h3 class="f-w-700 text-c-green"></h3>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-bullseye bg-c-green"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card comp-card">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h6 class="m-b-25">Arrears Recorded</h6>
                                                                <h3 class="f-w-700 text-c-yellow"></h3>
                                                                <p class="m-b-0"></p>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12">
                                                <div class="card proj-progress-card">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <!-- <div class="col-xl-3 col-md-6">
                                                                <h6>Published Project</h6>
                                                                <h5 class="m-b-30 f-w-700">532<span
                                                                        class="text-c-green m-l-10">+1.69%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-red"
                                                                        style="width:25%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Completed Task</h6>
                                                                <h5 class="m-b-30 f-w-700">4,569<span
                                                                        class="text-c-red m-l-10">-0.5%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-blue"
                                                                        style="width:65%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Successfull Task</h6>
                                                                <h5 class="m-b-30 f-w-700">89%<span
                                                                        class="text-c-green m-l-10">+0.99%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-green"
                                                                        style="width:85%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-md-6">
                                                                <h6>Ongoing Project</h6>
                                                                <h5 class="m-b-30 f-w-700">365<span
                                                                        class="text-c-green m-l-10">+0.35%</span></h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-c-yellow"
                                                                        style="width:45%"></div>
                                                                </div>
                                                            </div> -->
                                                        </div>
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
        </div>
    </div>
    @endsection