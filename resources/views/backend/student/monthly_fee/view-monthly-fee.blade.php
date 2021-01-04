@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Monthly Fee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Monthly Fee</li>
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
                                        <label for="">Month</label>
                                        <select name="month" id="month" class="form-control form-control-sm">
                                            <option value="">Select Month</option>
                                                <option value="january" >january</option>
                                                <option value="february" >february</option>
                                                <option value="march" >march</option>
                                                <option value="april">april</option>
                                                <option value="may" >may</option>
                                                <option value="june" >june</option>
                                                <option value="july" >july</option>
                                                <option value="august" >august</option>
                                                <option value="septembar" >septembar</option>
                                                <option value="octobar" >octobar</option>
                                                <option value="novembar" >novembar</option>
                                                <option value="december" >december</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" style="padding-top: 31px">
                                        <a id="search" class="btn btn-primary btn-sm" name="search">Search</a>
                                    </div>
                                </div>

                                <br>

                            </div>


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
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>
                                        @{{/each}}
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
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var month = $('#month').val();
            $('.notifyjs-corner').html('');

            if (year_id == ''){
                $.notify("Year required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (class_id == ''){
                $.notify("class required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (month == ''){
                $.notify("month required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            $.ajax({
                url: "{{route('students.monthly.fee.get-student')}}",
                type : "get",
                data: {'year_id': year_id, 'class_id':class_id, 'month':month},
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
