@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage student</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">student</li>
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
                                        Promotion student
                                    @else
                                        Add student
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('students.registation.view')}}"> <i class="fa fa-list"></i> student List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('students.registation.store',$editData->student_id)}}" method="post" id="addStudent" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{@$editData->id}}">
                                    <div class="form-row">



                                        <div class="form-group col-md-4">
                                            <label for="">Student Name</label>
                                            <input type="text" name="name" value="{{@$editData['student']['name']}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Father's Name</label>
                                            <input type="text" name="fname" value="{{@$editData['student']['fname']}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Mothers's Name</label>
                                            <input type="text" name="mname" value="{{@$editData['student']['mname']}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Mobile Name</label>
                                            <input type="text" name="mobile" value="{{@$editData['student']['mobile']}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Address</label>
                                            <input type="text" name="address" value="{{@$editData['student']['address']}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Gender</label>
                                            <select name="gender" id="" class="form-control form-control-sm">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{(@$editData['student']['gender']=='Male')?'selected':''}}>Male</option>
                                                <option value="Female" {{(@$editData['student']['gender']=='Female')?'selected':''}}>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Religious</label>
                                            <select name="religion" id="" class="form-control form-control-sm">
                                                <option value="">Select Religious</option>
                                                <option value="Islam" {{(@$editData['student']['religion']=='Islam')?'selected':''}}>Islam</option>
                                                <option value="Hindu" {{(@$editData['student']['gender']=='Hindu')?'selected':''}}>Hindu</option>
                                                <option value="Kristan" {{(@$editData['student']['gender']=='Kristan')?'selected':''}}>Kristan</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" name="dob" value="{{@$editData['student']['dob']}}"  class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Discount</label>
                                            <input type="text" name="discount" value="{{@$editData['discount']['discount']}}"  class="form-control form-control-sm" >
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Year</label>
                                            <select name="year_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year->id}}" {{(@$editData->year_id==$year->id)?'selected':''}}>{{$year->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Class</label>
                                            <select name="class_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Class</option>
                                                @foreach($classes as $cls)
                                                    <option value="{{$cls->id}}" {{(@$editData->class_id==$cls->id)?'selected':''}}>{{$cls->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Group</label>
                                            <select name="group_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Group</option>
                                                @foreach($groups as $grp)
                                                    <option value="{{$grp->id}}" {{(@$editData->group_id==$grp->id)?'selected':''}}>{{$grp->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Group</label>
                                            <select name="shift_id" id="" class="form-control form-control-sm">
                                                <option value="">Select Shift</option>
                                                @foreach($shifts as $shift)
                                                    <option value="{{$shift->id}}" {{(@$editData->shift_id==$shift->id)?'selected':''}}>{{$shift->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="src"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-4" >
                                            <img id="target" src="{{(!empty($editData['student']['image']))?url('public/upload/student_images/'.$editData['student']['image']):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 100px">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary" >{{(@$editData)?'Promotion':'Submit'}}</button>
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
                    "discount":{
                        required:true
                    },
                    "year_id":{
                        required:true
                    },
                    "class_id":{
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
