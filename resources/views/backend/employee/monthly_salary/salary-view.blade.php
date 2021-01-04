@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage  Employee Salary</h1>
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
                                <h3 class="card-title"> Select Date</h3>

                                    <a class="btn btn-success float-right" href="{{route('employees.attend.add')}}"> <i class="fa fa-plus-circle"></i>Add Employee Attedance</a>

                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="control-label">Date</label>
                                        <input type="date" name="date" id="date" class="form-control form-control-sm singledatepicker" autocomplete="off" placeholder="Date" >
                                    </div>
                                    <div class="form-group col-md-2">
                                        <a href="#" class="btn btn-sm btn-success" id="search" style="margin-top: 29px; color: white">Search</a>
                                    </div>
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
        $(document).on('click', '#search', function () {
            var date = $('#date').val();
            $('.notifyjs-corner').html('');

            if (date == ''){
                $.notify("Date required", {globalPosition: 'top right',className: 'error'});
                return false;
            }

            $.ajax({
                url: "{{route('employees.monthly.salary.get')}}",
                type : "get",
                data: {'date': date},
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
