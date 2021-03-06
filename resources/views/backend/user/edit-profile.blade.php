@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit User
                                    <a class="btn btn-success float-right" href="{{route('profiles.view')}}"><i class="fa fa-list"></i> View Profile</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('profiles.update', $editData->id)}}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{$editData->name}}" id="name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$editData->email}}" id="email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Mobile</label>
                                            <input type="text" name="mobile" value="{{$editData->mobile}}" id="email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" value="{{$editData->address}}" id="email" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="usertype">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="Male" {{($editData->gender == 'Male')? "selected": ""}}>Male</option>
                                                <option value="Female" {{($editData->gender == 'Female')? "selected": ""}}>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control" id="image">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{(empty($editData->image)) ? asset('public/backend/upload/no-image.png') : url('public/upload/user_images/'.$editData->image) }}" style="width: 170px; height: 160px" border="1px solid black" alt="">
                                        </div>
                                        <div class="form-group col-md-6" style="padding-top: 50px;">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(function () {

            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please enter your name!'
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
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
