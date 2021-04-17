@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Invoice</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                            <li class="breadcrumb-item active">Pending Invoice</li>
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
                                <h3>Pending Invoice List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th style="width: 12%">Amount</th>
                                        <th style="width: 12%">Status</th>
                                        <th style="width: 12%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   @foreach($allData as $key => $invoice)
                                     <tr>
                                       <td>{{ $key+1 }}</td>
                                          <td>
                                              {{ $invoice['payment']['customer']['name'] }} ({{ $invoice['payment']['customer']['mobile_no'] }})
                                            </td>
                                          <td>Invoice No #{{ $invoice->invoice_no }}</td>                                          <td>{{ date('d-m-y', strtotime($invoice->date)) }}</td>
                                          <td>{{ $invoice->description }}</td>
                                          <td>
                                            {{ $invoice['payment']['paid_amount'] }}
                                         </td>
                                         <td>
                                            @if($invoice->status == '0')
                                                <span style="background-color: red; color: white; padding: 3px;">Pending</span>
                                            @elseif ($invoice->status == '1')
                                                <span style="background-color: green; color: white; padding: 3px;">Approved</span>
                                            @endif
                                         </td>
                                         <td>
                                             @if ($invoice->status == '0')
                                             <a href="{{route('invoice.approve', $invoice->id)}}" title="Approve" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></a>
                                             <a href="{{route('invoice.delete', $invoice->id)}}" id="delete" title="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection
