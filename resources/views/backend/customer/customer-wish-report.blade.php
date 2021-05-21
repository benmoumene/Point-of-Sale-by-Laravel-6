@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Customer Report</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                                <h3>Select Criteria
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <strong>Customer Wish Credit Report</strong>
                                        <input type="radio" name="customer_wish_report" value="credit_wish" class="search_value"> &nbsp;&nbsp;                                        <strong>Customer Wish Paid Report</strong>
                                        <input type="radio" name="customer_wish_report" value="paid_wish" class="search_value"> &nbsp;&nbsp;
                                        <hr>
                                    </div>
                                </div>
                                <div class="show_credit" style="display: none;">
                                    <form action="" method="get" target="_blank">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="customer_id">Customer Name</label>
                                                <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 29px;">
                                                <button type="submit" class="btn btn-success">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- product wish pdf --}}
                                <div class="show_paid" style="display: none;">
                                    <form action="" method="get" target="_blank">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="customer_id">Customer Name</label>
                                                <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                    <option value="">Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 29px;">
                                                <button type="submit" class="btn btn-success">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script type="text/javascript">
    $(document).on('change', '.search_value', function(){
        var search_value = $(this).val();
        if(search_value == 'credit_wish'){
            $('.show_credit').show();
        } else {
            $('.show_credit').hide();
        }
        if(search_value == 'paid_wish'){
            $('.show_paid').show();
        } else {
            $('.show_paid').hide();
        }
    });
    </script>

    {{-- select2 --}}
    <script type="text/javascript">
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@endsection
