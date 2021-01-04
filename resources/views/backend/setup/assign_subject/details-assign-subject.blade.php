@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Assign Subject</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Assign Subject</li>
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
                                <h3> Assign Subject List</h3>

                                <a class="btn btn-success float-right" href="{{route('setup.assign.subject.view')}}"> <i class="fa fa-plus-circle"></i>View Assign Subject </a>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <h4><strong>Class Name: </strong>{{$editData['0']['student_class']['name']}}</h4>
                                <table  class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Subject</th>

                                        <th> Full Mark</th>
                                        <th> Pass Mark</th>
                                        <th> Subjective Mark</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($editData as $key => $value)
                                        <tr class="">
                                            <td>{{$key+1}}</td>

                                            <td>{{$value['subject']['name']}}</td>
                                            <td>{{$value->full_mark}}</td>
                                            <td>{{$value->pass_mark}}</td>
                                            <td>{{$value->subjective_mark}}</td>

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
