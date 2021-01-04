@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Student</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Student</li>
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
                                <h3> Student List</h3>

                                <a class="btn btn-success float-right" href="{{route('students.registation.add')}}"> <i class="fa fa-plus-circle"></i>Add Student </a>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('students.year.class.wise')}}" method="GET" id="viewStudent">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Year</label>
                                            <select name="year_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year->id}}" {{(@$year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Class</label>
                                            <select name="class_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Class</option>
                                                @foreach($classes as $cls)
                                                    <option value="{{$cls->id}}" {{(@$class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" style="padding-top: 31px">
                                            <button type="submit" class="btn btn-primary btn-sm" name="search">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                @if(!@$search)
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="7%">Sl.</th>
                                        <th>Name</th>

                                        <th> Id No</th>
                                        <th> Roll</th>
                                        <th> Year</th>
                                        <th> Class</th>
                                        <th> Image</th>
                                        @if(Auth::user()->role=="Admin")
                                        <th> Code</th>
                                        @endif
                                        <th> Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $value)
                                        <tr class="{{$value->id}}">
                                            <td>{{$key+1}}</td>

                                            <td>{{$value['student']['name']}}</td>
                                            <td>{{$value['student']['id_no']}}</td>
                                            <td>{{$value->roll}}</td>
                                            <td>{{$value['year']['name']}}</td>
                                            <td>{{$value['student_class']['name']}}</td>
                                            <td>
                                                    <img id="target" src="{{(!empty($value['student']['image']))?url('public/upload/student_images/'.$value['student']['image']):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 100px">
                                               </td>

                                            @if(Auth::user()->role=="Admin")
                                                <td> {{$value['student']['code']}}</td>
                                            @endif
                                            <td>
                                                <a href="{{route('students.registation.edit',$value->student_id)}}" title="Edite" style="cursor: pointer" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('students.registation.promotion',$value->student_id)}}" title="Promotion" style="cursor: pointer" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                                <a href="{{route('students.registation.details',$value->student_id)}}" target="_blank" title="details" style="cursor: pointer" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @else

                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th width="7%">Sl.</th>
                                            <th>Name</th>

                                            <th> Id No</th>
                                            <th> Roll</th>
                                            <th> Year</th>
                                            <th> Class</th>
                                            <th> Image</th>
                                            @if(Auth::user()->role=="Admin")
                                                <th> Code</th>
                                            @endif
                                            <th> Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allData as $key => $value)
                                            <tr class="{{$value->id}}">
                                                <td>{{$key+1}}</td>

                                                <td>{{$value['student']['name']}}</td>
                                                <td>{{$value['student']['id_no']}}</td>
                                                <td>{{$value->roll}}</td>
                                                <td>{{$value['year']['name']}}</td>
                                                <td>{{$value['student_class']['name']}}</td>
                                                <td>
                                                    <img id="target" src="{{(!empty($value['student']['image']))?url('public/upload/student_images/'.$value['student']['image']):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 100px">
                                                </td>

                                                @if(Auth::user()->role=="Admin")
                                                    <td> {{$value['student']['code']}}</td>
                                                @endif
                                                <td>
                                                    <a href="{{route('students.registation.edit',$value->student_id)}}" title="Edite" style="cursor: pointer" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('students.registation.promotion',$value->student_id)}}" title="Promotion" style="cursor: pointer" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                                    <a href="{{route('students.registation.details',$value->student_id)}}" target="_blank" title="details" style="cursor: pointer" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
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

            $('#viewStudent').validate({
                rules: {
                    "year_id": {
                        required: true,
                    },
                    "class_id":{
                        required:true
                    },


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

    </script>
@endsection
