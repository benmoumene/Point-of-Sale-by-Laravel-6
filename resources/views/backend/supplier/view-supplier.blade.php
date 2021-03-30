@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Supplier List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Suppliers</li>
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
                                <h3>Supplier List
                                    <a class="btn btn-success float-right" href="{{route('suppliers.add')}}"><i class="fa fa-plus-circle"></i> Add Supplier</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $supplier)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->mobile_no }}</td>
                                            <td>{{ $supplier->email  }}</td>
                                            <td>{{ $supplier->address  }}</td>
                                            @php
                                                $count_supplier = App\Model\Product::where('supplier_id', $supplier->id)->count();
                                            @endphp
                                            <td>
                                                <a href="{{route('suppliers.edit', $supplier->id)}}" title="edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                @if ($count_supplier < 1)
                                                    <a href="{{route('suppliers.delete', $supplier->id)}}" id="delete" title="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
