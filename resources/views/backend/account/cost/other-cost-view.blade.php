@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Other Cost</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Other Cost</li>
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
                                <h3> Other Cost List</h3>

                                <a class="btn btn-success float-right" href="{{route('accounts.cost.add')}}"> <i class="fa fa-plus-circle"></i>Add Other Cost</a>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->date}}</td>
                                            <td>{{$data->amount}}</td>
                                            <td>{{$data->description}} TK</td>
                                            <td>
                                                <img src="{{(!empty($data->image))?url('public/upload/cost_images/'.$data->image):url('public/assets/backend/upload/default.png')}}"
                                                     alt="" width="90px" height="60px">
                                            </td>
                                            <td>
                                                <a href="{{route('accounts.cost.edit',$data->id)}}" class="btn btn-info btn-sm" title="Edit"> <i class="fa fa-edit"></i> </a>
                                            </td>
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
