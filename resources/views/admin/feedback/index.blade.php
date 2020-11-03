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
                   

                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                   
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Feedback received</h5>
                            
                                            </div>
                                            
                                            <div class="card-block">
                                                <div class="dt-responsive table-responsive">
                                                <table id="order-table" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th>No</th>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>File</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                @if(count($snapshot) > 0)
                                                    @foreach($snapshot as $ref=>$res)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $snapshot[$ref]['debtor'] }}</td>
                                                         <td>{{ $snapshot[$ref]['creditor'] }}</td>                                                  
                                                        <td><a href="{{$snapshot[$ref]['imageName']}}"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">
                                                                <span class="glyphicon glyphicon-edit"></span> View File
                                                            </button></a></td>
                                                        <td>{{ $snapshot[$ref]['description'] }}</td>
                        
                                                        <td className="text-right">
                                                            
                                                            <a href= "{{route('feedback.delete', $ref)}}">
                                                            <button class="btn btn-danger btn-sm">
                                                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                                            </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h4 class="card-title">Arrears Category Not Created yet.</h4>
                                                    </td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>No</th>
                                                    <th>Debtor</th>
                                                    <th>Creditor</th>
                                                    <th>File</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                    </tr>
                                                </tfoot>
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


