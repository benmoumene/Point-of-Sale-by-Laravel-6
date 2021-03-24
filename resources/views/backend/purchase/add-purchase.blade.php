@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Purchase</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Purchase</li>
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
                                <h3>Add Purchase
                                    <a class="btn btn-success float-right" href="{{route('purchase.view')}}"><i
                                            class="fa fa-list"></i> View Purchase</a>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id="date" class="form-control datepicker" placeholder="YYYY-MM-DD">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="purchase_no">Purchase_no</label>
                                            <input type="text" name="purchase_no" id="purchase_no" class="form-control"/>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="supplier_id">Select Supplier</label>
                                            <select name="supplier_id" id="supplier_id" class="form-control">
                                                <option value="">Select Supplier</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="category_id">Select Category</label>
                                            <select name="category_id" id="category_id" class="form-control" disabled>
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="product_id">Select Product</label>
                                            <select name="product_id" id="product_id" class="form-control" disabled>
                                                <option value="">Select Product</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2" style="padding-top: 30px;">
                                            <i class="fa fa-plus-circle btn btn-primary addeventmore">Add Item</i>
                                        </div>
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
        $(function (){
            $(document).on('change', '#supplier_id', function () {
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-category') }}",
                    type: "GET",
                    data: {
                        supplier_id: supplier_id
                    },
                    success: function (data) {
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function (key,v) {
                           html += '<option value="'+v.category_id+'">'+v.category.name+'</option>';
                        });
                        $('#category_id').html(html);
                        $('#category_id').removeAttr("disabled");
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function (){
            $(document).on('change', '#category_id', function () {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function (data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function (key,v) {
                            html += '<option value="'+v.product_id+'">'+v.name+'</option>';
                        });
                        $('#product_id').html(html);
                        $('#product_id').removeAttr("disabled");
                    }
                });
            });
        });
    </script>
    <script>
        $(function () {

            $('#myForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
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
    <script>
        // $('.datepicker').datepicker({
        //     uiLibrary: 'bootstrap4',
        //     format: 'yyyy-mm-dd'
        // });
    </script>
@endsection
