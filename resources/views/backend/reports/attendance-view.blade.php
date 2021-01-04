@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Employee Attendance Report </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Attendance Report </li>
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
                                <h3 class="card-teal"> Employee Attendance Report List</h3>


                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('reports.attendance.get')}}" method="GET" id="myform" target="_blank">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="employee_id">Employee Name</label>
                                            <select name="employee_id" id="employee_id" class="form-control select2bs4">
                                                <option value="">Select Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" name="search" style="margin-top: 31px;">Search</button>
                                        </div>
                                    </div>
                                </form>
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
