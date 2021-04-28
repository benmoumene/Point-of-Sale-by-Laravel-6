@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Purchase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Daily Purchase</li>
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
                            <h3>Daily Purchase Report
                                <a class="btn btn-success float-right" href="{{route('invoice.view')}}"><i
                                        class="fa fa-list"></i> View Invoice</a>
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
                            <form action="{{ route('purchase.daily.report.pdf') }}" method="GET" target="_blank" id="myForm">
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="date">Date</label>
                                        <input type="date" name="start_date" id="date" class="form-control"
                                            placeholder="YYYY-MM-DD" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="date">Date</label>
                                        <input type="date" name="end_date" id="date1" class="form-control"
                                            placeholder="YYYY-MM-DD" required>
                                    </div>
                                    <div class="form-group col-md-2" style="padding-top: 30px;">
                                        <button type="submit" class="btn btn-primary"> Search</button>
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
        //   $('#date').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        //   }, function(start, end, label) {
        //   });
    });

</script>
@endsection
