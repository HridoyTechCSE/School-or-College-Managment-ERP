@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Employee</h1>
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
                                <h3>
                                    @if(isset($editData))
                                        Edit Employee
                                    @else
                                        Add Employee
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('employees.reg.view')}}"> <i class="fa fa-list"></i> Employee List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{(@$editData)?route('employees.reg.update',$editData->id):route('employees.reg.store')}}" method="post" id="" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Employee Name</label>
                                            <input type="text" name="name" value="{{@$editData->name}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Father's Name</label>
                                            <input type="text" name="fname" value="{{@$editData->fname}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Mothers's Name</label>
                                            <input type="text" name="mname" value="{{@$editData->mname}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Mobile Name</label>
                                            <input type="text" name="mobile" value="{{@$editData->mobile}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Address</label>
                                            <input type="text" name="address" value="{{@$editData->address}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Gender</label>
                                            <select name="gender" id="" class="form-control form-control-sm">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{(@$editData->gender =='Male')?'selected':''}}>Male</option>
                                                <option value="Female" {{(@$editData->gender =='Female')?'selected':''}}>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Religious</label>
                                            <select name="religion" id="" class="form-control form-control-sm">
                                                <option value="">Select Religious</option>
                                                <option value="Islam" {{(@$editData->religion=='Islam')?'selected':''}}>Islam</option>
                                                <option value="Hindu" {{(@$editData->religion=='Hindu')?'selected':''}}>Hindu</option>
                                                <option value="Kristan" {{(@$editData->religion=='Kristan')?'selected':''}}>Kristan</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" name="dob" value="{{@$editData->dob}}"  class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Designation</label>
                                            <select name="designation_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Designation</option>
                                                @foreach($designation as $desing)
                                                    <option value="{{$desing->id}}" {{(@$editData->designation_id==$desing->id)?'selected':''}}>{{$desing->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if(!@$editData)
                                        <div class="form-group col-md-4">
                                            <label for="">Salary</label>
                                            <input type="text" name="salary" value="{{@$editData->salary}}"  class="form-control form-control-sm" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Join Date</label>
                                            <input type="date" name="join_date" value="{{@$editData->dob}}"  class="form-control form-control-sm" autocomplete="off">
                                        </div>

                                        @endif

                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="src"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-4" >
                                            <img id="target" src="{{(!empty($editData->image))?url('public/upload/employee_images/'.$editData->image):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 100px">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
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
        $(document).ready(function () {

            $('#addStudent').validate({
                rules: {
                    "name": {
                        required: true,
                    },
                    "fname":{
                        required:true
                    },
                    "mname": {
                        required: true
                    },
                    "mobile":{
                        required:true
                    },
                    "address":{
                        required:true
                    },
                    "gender":{
                        required:true
                    },
                    "religion":{
                        required:true
                    },
                    "salary":{
                        required:true
                    },
                    "designation_id":{
                        required:true
                    },
                    "join_date":{
                        required:true
                    },
                    "dob":{
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
