@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Employee Salary</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Salary</li>
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
                                <h3>

                                         Employee Salary Increment


                                </h3>
                                <a class="btn btn-success float-right" href="{{route('employees.salary.view')}}"> <i class="fa fa-list"></i> Employee List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('employees.salary.store',$editData->id)}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">



                                        <div class="form-group col-md-4">
                                            <label for="">Salary Amount</label>
                                            <input type="text" name="increment_salary"  class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Effected Date</label>
                                            <input type="date" name="effected_date" placeholder="date" class="form-control">
                                        </div>


                                        <br>


                                        <div class="form-group col-md-4">



                                            <button type="submit" class="btn btn-primary" style="margin-top: 31px" >submit</button>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
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
