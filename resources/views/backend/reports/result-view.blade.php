@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Result View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Result View</li>
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
                                <h3 class="card-teal"> Result View List</h3>


                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('reports.result.get')}}" method="GET" id="myform" target="_blank">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="year_id">Year</label>
                                            <select name="year_id" id="year_id" class="form-control select2bs4">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year->id}}">{{$year->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="class_id">Class</label>
                                            <select name="class_id" id="class_id" class="form-control select2bs4">
                                                <option value="">Select Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="class_id">Exam Type</label>
                                            <select name="exam_type_id" id="exam_type_id" class="form-control select2bs4">
                                                <option value="">Select Exam Type</option>
                                                @foreach($exam_types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button type="submit" class="btn btn-primary" name="search" style="margin-top: 31px">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->

                            <div class="card-body">
                                <div id="DocumentResults"></div>
                                <script id="document-template" type="text/x-handlebars-template">
                                    <table class="table-sm table-bordered table-striped" style="width: 100%">
                                        <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>

                                        </tbody>
                                    </table>

                                </script>
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
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            $('.notifyjs-corner').html('');

            if (start_date == ''){
                $.notify("start date required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (end_date == ''){
                $.notify("end date required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            $.ajax({
                url: "{{route('reports.profit.datewise.get')}}",
                type : "GET",
                data: {'start_date':start_date,'end_date':end_date},
                beforeSend: function(){

                },
                success: function (data){
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });


    </script>
@endsection
