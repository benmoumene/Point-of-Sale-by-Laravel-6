@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    <section class="col-md-4 offset-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{(empty($user->image)) ? asset('public/backend/upload/no-image.png') : url('public/upload/user_images/'.$user->image) }}"
                                             alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->name  }}</h3>

                                    <p class="text-muted text-center">{{ $user->address }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Mobile</b> <a class="float-right">{{ $user->mobile }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Gender</b> <a class="float-right">{{ $user->gender }}</a>
                                        </li>
                                    </ul>

                                    <a href="{{ route('profiles.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    </section>
                </div>
                <!-- /.row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
