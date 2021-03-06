@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Employee Attedance</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Attedance</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3> Employee Attedance Details</h3>

                                <a class="btn btn-success float-right" href="{{route('employees.attend.view')}}"> <i class="fa fa-list"></i> Employee Attedance list</a>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Id No</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Attend Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $key => $value)
                                        <tr class="{{$value->id}}">
                                            <td>{{$key+1}}</td>

                                            <td>{{$value['user']['id_no']}}</td>
                                            <td>{{$value['user']['name']}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>{{$value->attend_status}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                    </section>
                    <!-- /.Left col -->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
