@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Slider</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                                <h3>edit Slider </h3>
                                <a class="btn btn-success float-right" href="{{route('sliders.view')}}"> <i class="fa fa-list"></i> Slider List</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('sliders.update',$editData->id)}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">



                                        <div class="form-group col-md-4">
                                            <label for="short_title">short_title</label>
                                            <input type="text" name="short_title" value="{{$editData->short_title}}" id="short_title"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="long_title">long_title</label>
                                            <input type="text" name="long_title" value="{{$editData->long_title}}" id="long_title"  class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="src"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-12" >
                                            <img id="target" src="{{(!empty($editData->image))?url('public/upload/slider_images/'.$editData->image):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 100px">
                                        </div>


                                        <br>


                                        <div class="form-group col-md-6">

                                            <input type="submit" value="update" class="btn btn-primary">
                                        </div>
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
@endsection
