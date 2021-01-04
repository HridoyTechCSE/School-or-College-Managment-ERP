@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Employee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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
                                <h3> Employee List</h3>

                                <a class="btn btn-success float-right" href="{{route('employees.reg.add')}}"> <i class="fa fa-plus-circle"></i>Add Employee </a>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Join Date</th>
                                        <th>Salary</th>
                                        @if(Auth::user()->role=="Admin")
                                            <th>Code</th>
                                        @endif
                                        <th> Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $value)
                                        <tr class="{{$value->id}}">
                                            <td>{{$key+1}}</td>

                                            <td>{{$value->name}}</td>
                                            <td>{{$value->mobile}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{date('d-m-Y',strtotime($value->join_date))}}</td>
                                            <td>{{$value->salary}}</td>

                                            @if(Auth::user()->role=="Admin")
                                                <td>{{$value->code}}</td>
                                            @endif

                                            <td><a href="{{route('employees.reg.edit',$value->id)}}" title="Edite" style="cursor: pointer" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('employees.reg.details',$value->id)}}"  target="_blank" title="details" style="cursor: pointer" class="btn btn-sm btn-success"
                                                ><i class="fa fa-eye"></i></a>
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
