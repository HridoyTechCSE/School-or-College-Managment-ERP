@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Employee Leave</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Leave</li>
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
                                    @if(isset($editData))
                                        Edit Employee Leave
                                    @else
                                        Add Employee Leave
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('employees.leave.view')}}"> <i class="fa fa-list"></i> Employee Leave List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{(@$editData)?route('employees.leave.update',$editData->id):route('employees.leave.store')}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">



                                        <div class="form-group col-md-4">
                                            <label for="">Employee Name</label>
                                            <select name="employee_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{@$employee->id}}" {{(@$editData->employee_id==$employee->id)?'selected':''}}>{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Start Date</label>
                                            <input type="date" name="start_date" value="{{@$editData->start_date}}" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">End Date</label>
                                            <input type="date" name="end_date" value="{{@$editData->end_date}}" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Leave Purpose</label>
                                            <select name="leave_purpose_id" id="leave_purpose_id"  class="form-control form-control-sm">
                                                <option value="">Select Leave Purpose</option>
                                                @foreach($leave_purpose as $purpose)
                                                    <option value="{{@$purpose->id}}" {{(@$editData->leave_purpose_id==$purpose->id)?'selected':''}}>{{$purpose->name}}</option>

                                                @endforeach
                                                <option value="0">New Purpose</option>
                                            </select>
                                            <input type="text" name="name" class="form-control form-control-sm" placeholder="Write Purpose" id="add_others" style="display: none">
                                        </div>


                                        <br>


                                        <div class="form-group col-md-12">



                                            <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
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

    <script type="text/javascript">
        $(document).ready(function (){
            $(document).on('change','#leave_purpose_id',function (){
                var leave_purpose_id = $(this).val();
                if (leave_purpose_id == '0'){
                    $('#add_others').show();
                }else {
                    $('#add_others').hide();
                }
            });
        });
    </script>

@endsection


