@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Marks Entry</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roll Generate</li>
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
                                <h3> Search Criteria</h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('marks.store')}}" method="POST" id="rollStudent">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="">Year</label>
                                            <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year->id}}" >{{$year->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Class</label>
                                            <select name="class_id" id="class_id" class="form-control form-control-sm">
                                                <option value="">Select Class</option>
                                                @foreach($classes as $cls)
                                                    <option value="{{$cls->id}}" >{{$cls->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Subject</label>
                                            <select name="assign_subject_id" id="assign_subject_id" class="form-control form-control-sm select2bs4">
                                                <option value="">Select Subject</option>

                                            </select>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label for="">Exam Type</label>
                                            <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm">
                                                <option value="">Select Exam Type</option>
                                                @foreach($exam_types as $exam)
                                                    <option value="{{$exam->id}}" >{{$exam->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" style="padding-top: 31px">
                                            <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped dt-responsive" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    <th>Id No</th>
                                                    <th>Student Name</th>
                                                    <th>Fathers Name</th>
                                                    <th>Gender</th>
                                                    <th>Marks</th>
                                                </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">

                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm ">Marks Entry</button>
                                    </div>

                                </form>
                            </div>


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
        $(document).on('click', '#search', function () {
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var assign_subject_id = $('#assign_subject_id').val();
            var exam_type_id = $('#exam_type_id').val();
            $('.notifyjs-corner').html('');

            if (year_id == ''){
                $.notify("Year required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (class_id == ''){
                $.notify("class required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (assign_subject_id == ''){
                $.notify("Subject required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (exam_type_id == ''){
                $.notify("Exam Type required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            $.ajax({
                url: "{{route('get-student')}}",
                type : "GET",
                data: {'year_id': year_id, 'class_id':class_id},
                success: function (data){
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each( data, function (key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'">' +
                            '<input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });





      $(function (){
         $(document).on('change','#class_id',function () {
            var class_id =$('#class_id').val();
             $.ajax({
                 url: "{{route('get-subject')}}",
                 type : "GET",
                 data: {class_id:class_id},
                 success: function (data){
                    var html = '<option value="">Select Subject</option>';
                    $.each( data, function ( key, v) {
                        html +='<option value="'+v.id+'">'+v.subject.name+'</option>';
                    });
                    $('#assign_subject_id').html(html);
                 }
             });
         });
      });




    </script>



    <script type="text/javascript">
        $(document).ready(function () {

            $('#rollStudent').validate({
                rules: {
                    "roll[]": {
                        required: true,
                    },

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
