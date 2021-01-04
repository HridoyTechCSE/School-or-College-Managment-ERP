@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edite Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                                <h3>Edit User </h3>
                                <a class="btn btn-success float-right" href="{{route('profiles.view')}}"> <i class="fa fa-list"></i> Your Profile</a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('profiles.update',$editData->id)}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="email">email</label>
                                            <input type="text" name="email" value="{{$editData->email}}" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="mobile">mobile</label>
                                            <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="address">address</label>
                                            <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="usertype">Gender</label>
                                            <select name="gender" id="Gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                                                <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="image">image</label>
                                            <input type="file" name="image" id="src"  class="form-control">
                                        </div>
                                        <div class="form-group col-md-12" >
                                            <img id="target" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_image.png')}}" alt="" style="width: 150px; height: 150px;">
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
