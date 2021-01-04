@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Fee Amount</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Fee Amount</li>
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

                                        Add Fee Amount


                                </h3>
                                <a class="btn btn-success float-right" href="{{route('setups.fee.amount.view')}}"> <i class="fa fa-list"></i> Fee Amount List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('setups.fee.amount.update',$editData[0]->fee_category_id)}}" method="post" id="addfeeamnt" enctype="multipart/form-data">
                                    @csrf
                                    <div class="add-item">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for=""> Fee Category</label>
                                                <select name="fee_category_id" class="form-control">
                                                    <option value="">Select Fee Category</option>
                                                    @foreach($fee_categories as $category)
                                                        <option value="{{$category->id}}" {{($editData['0']->fee_category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @foreach($editData as $edit)
                                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="">Class</label>
                                                <select name="class_id[]" class="form-control">
                                                    <option value="">Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{$class->id}}" {{($edit->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="">Amount</label>
                                                <input type="text" name="amount[]" value="{{$edit->amount}}" class="form-control">
                                            </div>

                                            <div class="form-group col-md-1" style="padding-top: 30px">
                                                <div class="form-row">
                                                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                                                    <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <button type="submit" class="btn btn-primary" >{{(@$editData)?'Update':'Submit'}}</button>
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


    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Class</label>
                        <select name="class_id[]" class="form-control">
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="">Amount</label>
                        <input type="text" name="amount[]" class="form-control">
                    </div>

                    <div class="form-group col-md-1" style="padding-top: 30px">
                        <div class="form-row">
                            <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                            <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click",".addeventmore",function () {
                var whole_extra_item_add =$("#whole_extra_item_add").html();
                $(this).closest(".add-item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click",".removeeventmore",function () {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter-= 1;
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {

            $('#addfeeamnt').validate({
                rules: {
                    "fee_category_id": {
                        required: true,
                    },
                    "class_id[]":{
                        required:true
                    },
                    "amount[]": {
                        required: true

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

    </script>
@endsection
