@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Stock</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Stock</li>
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
                                        <strong>Supplier Wish Report</strong>
                                        <input type="radio" name="supplier_product_wish" value="supplier_wish" class="search_value"> &nbsp;&nbsp;                                        <strong>Product Wish Report</strong>
                                        <input type="radio" name="supplier_product_wish" value="product_wish" class="search_value"> &nbsp;&nbsp;
                                        <hr>
                                    </div>
                                </div>
                                <div class="show_supplier" style="display: none;">
                                    <form action="{{ route('stock.report.supplier.wish.pdf') }}" method="get" id="supplierWishForm" target="_blank">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="supplier_id">Supplier Name</label>
                                                <select name="supplier_id" id="supplier_id" class="form-control select2" required>
                                                    <option value="">Select Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name}}</option>
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
                                <div class="show_product" style="display: none;">
                                    <form action="{{ route('stock.report.product.wish.pdf') }}" method="get" id="productWishForm" target="_blank">
                                        <div class="form-row">
                                                <div class="form-group col-md-3 offset-3">
                                                    <label for="category_id">Select Category</label>
                                                    <select name="category_id" id="category_id" class="form-control select2" required>
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="product_id">Select Product</label>
                                                    <select name="product_id" id="product_id" class="form-control select2" disabled required>
                                                        <option value="">Select Product</option>
                                                    </select>
                                                </div>
                                            <div class="col-md-4 offset-6" style="padding-top: 29px;">
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
        if(search_value == 'supplier_wish'){
            $('.show_supplier').show();
        } else {
            $('.show_supplier').hide();
        }
        if(search_value == 'product_wish'){
            $('.show_product').show();
        } else {
            $('.show_product').hide();
        }
    });
    </script>
<script type="text/javascript">
    $(function () {
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
                    $.each(data, function (key, v) {
                        html += '<option value="' + v.id + '">' + v.name +
                            '</option>';
                    });
                    $('#product_id').html(html);
                    $('#product_id').removeAttr("disabled");
                }
            });
        });
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
