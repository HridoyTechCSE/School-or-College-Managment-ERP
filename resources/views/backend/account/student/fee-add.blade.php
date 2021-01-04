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
                        <h1 class="m-0 text-dark">Manage Student Fee</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Student Fee</li>
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
                                        Edit Student Fee
                                    @else
                                        Add Student Fee
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('accounts.fee.view')}}"> <i class="fa fa-list"></i> Student Fee List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                               <div class="form-row">
                                   <div class="form-group col-md-3">
                                       <label for=""> year</label>
                                       <select name="year_id" id="year_id" class="form-control select2bs4">
                                           <option value="">Select year</option>
                                           @foreach($years as $year)
                                               <option value="{{$year->id}}">{{$year->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for=""> class</label>
                                       <select name="class_id" id="class_id" class="form-control select2bs4">
                                           <option value="">Select class</option>
                                           @foreach($classes as $class)
                                               <option value="{{$class->id}}">{{$class->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="form-group col-md-3">
                                       <label for=""> Exam type</label>
                                       <select name="fee_category_id" id="fee_category_id" class="form-control select2bs4">
                                           <option value="">Select Fee Category</option>
                                           @foreach($fee_categories as $category)
                                               <option value="{{$category->id}}">{{$category->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>

                                   <div class="form-group col-md-3">
                                       <label for=""> Date</label>
                                       <input type="date" name="date" id="date" class="form-control singledatepicker" placeholder="DD-MM-YYYY">
                                   </div>

                                   <div class="form-group col-md-3">
                                       <a href="#" id="search" class="btn btn-primary" name="search">Search</a>
                                   </div>
                               </div>
                            </div><!-- /.card-body -->

                            <div class="card-body">
                                <div id="DocumentResults"></div>

                                <script id="document-template" type="text/x-handlebars-template">
                                    <form action="{{route('accounts.fee.store')}}" method="post">
                                        @csrf
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
                                        <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px;">Submit</button>
                                    </form>
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
            var fee_category_id = $('#fee_category_id').val();
            var date = $('#date').val();
            $('.notifyjs-corner').html('');

            if (year_id == ''){
                $.notify("Year required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (class_id == ''){
                $.notify("class required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (fee_category_id == ''){
                $.notify("Exam Type required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (date == ''){
                $.notify("date required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            $.ajax({
                url: "{{route('accounts.fee.get-student')}}",
                type : "get",
                data: {'year_id': year_id, 'class_id':class_id, 'fee_category_id':fee_category_id, 'date':date},
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


