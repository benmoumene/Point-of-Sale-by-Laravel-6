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
                                    </div>
                                </div>
                                <div class="show_supplier">
                                    <form action="" method="get" id="supplierWishForm">
                                        <div class="form-row">
                                            <div class="col-md-8">
                                                <label for="supplier_id">Supplier Name</label>
                                                <select name="supplier_id" id="supplier_id" class="form-control select2">
                                                    <option value="">Select Supplier</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 29px;">
                                                <button class="btn btn-success">Search</button>
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
@endsection
