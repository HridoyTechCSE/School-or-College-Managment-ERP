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
                        <h1 class="m-0 text-dark">Manage Other Cost</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Other Cost</li>
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
                                        Edit Other Cost
                                    @else
                                        Add Other Cost
                                    @endif

                                </h3>
                                <a class="btn btn-success float-right" href="{{route('accounts.cost.view')}}"> <i class="fa fa-list"></i> Other Cost List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{(@$editData)?route('accounts.cost.update',$editData->id):route('accounts.cost.store')}}" method="post" id="" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="">Date</label>
                                            <input type="date" name="date" value="{{@$editData->date}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Amount</label>
                                            <input type="text" name="amount" value="{{@$editData->amount}}"  class="form-control form-control-sm">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="src"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <img id="target" src="{{(!empty($editData->image))?url('public/upload/cost_images/'.$editData->image):url('public/assets/backend/upload/default.png')}}" alt="" style="width: 150px; height: 100px">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">Description</label>
                                            <textarea  name="description" rows="4"   class="form-control form-control-sm">{{@$editData->description}} </textarea>
                                        </div>


                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
                                    </div>

                                </form>
                            </div><!-- /.card-body -->

                            <div class="card-body">
                                <div id="DocumentResults"></div>

                                <script id="document-template" type="text/x-handlebars-template">
                                    <form action="{{route('accounts.salary.store')}}" method="post">
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
            var date = $('#date').val();
            $('.notifyjs-corner').html('');


            if (date == ''){
                $.notify("date required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            $.ajax({
                url: "{{route('accounts.salary.get-employee')}}",
                type : "get",
                data: {'date':date},
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


