@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Password</li>
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
                            <h3>Edit Password
                                <a class="btn btn-success float-right" href="{{route('profiles.view')}}"><i
                                        class="fa fa-list"></i> Back To Profile</a>
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
                            <form action="{{route('profiles.password.update')}}" method="post" id="myForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="again_new_password">Password again</label>
                                        <input type="password" name="again_new_password" id="again_new_password"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
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
                current_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minlength: 8
                },
                again_new_password: {
                    required: true,
                    equalTo: '#new_password'
                },
            },
            messages: {
                current_password: {
                    required: "Please provide old password password",
                },
                new_password: {
                    required: "Please provide new password",
                    minlength: "Your password must be at least 8 characters long"
                },
                again_new_password: {
                    required: "Please enter confirm password",
                    equalTo: "Confirm password does not match!"
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
