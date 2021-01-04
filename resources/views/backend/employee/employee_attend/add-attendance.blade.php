@extends('backend.layouts.master')
@section('content')


    <style type="text/css">
        .switch-toggle{
            width: auto;
        }
        .switch-toggle label:not(.disabled){
            cursor: pointer;
        }
        .switch-candy a{
            border: 1px solid #333;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,0.2), insert 0 1px 1px rgba(255,255,255,0.45);
            background-color: white;
            background-image: -webkit-linear-gradient(top, rgba(255,255,255, 0.2), transparent);
            background-image: linear-gradient(to bottom, rgba(255,255,255, 0.2), transparent);
        }
        .switch-toggle.switch-candy, .switch-light.switch-candy > span{
            background-color: #5a6268;
            border-radius: 3px;
            box-shadow: inset 0 2px 6px rgba(0,0,0,0.3), 0 1px 0 rgba(255,255,255, 0.2);
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Employee Attendance</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employee Attendance</li>
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
                                        Edit Employee Attendance
                                    @else
                                        Add Employee Attendance
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('employees.attend.view')}}"> <i class="fa fa-list"></i> Employee Leave List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('employees.attend.store')}}" method="post" id="addattend" enctype="multipart/form-data">
                                    @csrf

                                    @if(isset($editData))
                                        <div class="card-body">

                                            <div class="form-group col-md-4">
                                                <label for="">Attendance Date</label>
                                                <input type="date" name="date" id="date" value="{{$editData['0']['date']}}" class="checkdate form-control form-control-sm" placeholder="Attendance date" autocomplete="off">
                                            </div>
                                            <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL.</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                                                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 25%">Attendance Status</th>
                                                </tr>

                                                <tr>
                                                    <th class="text-center text-white btn present_all" style="display: table-cell;background-color: #114190">Present</th>
                                                    <th class="text-center text-white btn leave_all" style="display: table-cell;background-color: #114190">Leave</th>
                                                    <th class="text-center text-white btn absent_all" style="display: table-cell;background-color: #114190">Absent</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($editData as $key => $data)
                                                    <tr id="div{{$data->id}}" class="text-center">
                                                        <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}" class="employee_id">
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$data['user']['name']}}</td>
                                                        <td colspan="4">
                                                            <div class="switch-toggle switch-3 switch-candy">
                                                                <input type="radio" class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" {{($data->attend_status=='Present')?'checked':''}} />
                                                                <label for="present{{$key}}">Present</label>

                                                                <input type="radio" class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave" {{($data->attend_status=='Leave')?'checked':''}} />
                                                                <label for="present{{$key}}">Leave</label>

                                                                <input type="radio" class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent" {{($data->attend_status=='Absent')?'checked':''}} />
                                                                <label for="absent{{$key}}">Absent</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>


                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
                                            </div>
                                        </div>
                                    @else
                                    <div class="card-body">

                                        <div class="form-group col-md-4">
                                            <label for="">Attendance Date</label>
                                            <input type="date" name="date" id="date" class="checkdate form-control form-control-sm" placeholder="Attendance date" autocomplete="off">
                                        </div>
                                        <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL.</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                                                    <th colspan="3" class="text-center" style="vertical-align: middle; width: 25%">Attendance Status</th>
                                                </tr>

                                            <tr>
                                                <th class="text-center text-white btn present_all" style="display: table-cell;background-color: #114190">Present</th>
                                                <th class="text-center text-white btn leave_all" style="display: table-cell;background-color: #114190">Leave</th>
                                                <th class="text-center text-white btn absent_all" style="display: table-cell;background-color: #114190">Absent</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($employees as $key => $employee)
                                                    <tr id="div{{$employee->id}}" class="text-center">
                                                        <input type="hidden" name="employee_id[]" value="{{$employee->id}}" class="employee_id">
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$employee->name}}</td>
                                                        <td colspan="4">
                                                            <div class="switch-toggle switch-3 switch-candy">
                                                                <input type="radio" class="present" id="present{{$key}}" name="attend_status{{$key}}" value="Present" checked="checked" />
                                                                <label for="present{{$key}}">Present</label>

                                                                <input type="radio" class="leave" id="leave{{$key}}" name="attend_status{{$key}}" value="Leave"  />
                                                                <label for="present{{$key}}">Leave</label>

                                                                <input type="radio" class="absent" id="absent{{$key}}" name="attend_status{{$key}}" value="Absent"  />
                                                                <label for="absent{{$key}}">Absent</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
                                        </div>
                                    </div>
                                    @endif
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
        $(document).ready(function () {

            $('#addattend').validate({
                rules: {
                    date: {
                        required: true,
                    }
                },
                messages: {


                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });



        $(document).on('click','.present', function (){
           $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','$dee2e6').css('color','#495057');
        });
        $(document).on('click','.leave', function (){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','$dee2e6').css('color','#495057');
        });
        $(document).on('click','.absent', function (){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','$dee2e6').css('color','#495057');
        });




        $(document).on('click','.present_all', function (){
            $("input[value=Present]").prop('checked',true);
            $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
        });

        $(document).on('click','.leave_all', function (){
            $("input[value=Leave]").prop('checked',true);
            $('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
        });
        $(document).on('click','.absent_all', function (){
            $("input[value=Absent]").prop('checked',true);
            $('.datetime').css('pointer-events','none').css('background-color','#dee3e6').css('color','#dee2e6');
        });

    </script>


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


