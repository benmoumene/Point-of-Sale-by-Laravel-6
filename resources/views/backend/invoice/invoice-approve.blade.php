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
                        <li class="breadcrumb-item active">Invoice Approve</li>
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
                            <h3> Invoice No #{{ $invoice->invoice_no }}({{ date('d-m-Y', strtotime($invoice->date)) }})
                                <a class="btn btn-success float-right" href="{{route('invoice.pending.list')}}"><i
                                        class="fa fa-list"></i> Pending Invoice</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                @php
                                $payment = App\Model\Payment::where('invoice_id', $invoice->id)->first();
                                @endphp
                                <tbody>
                                    <tr>
                                        <td width="15%">
                                            <p style="font-weight: bold;">Customer Info: </p>
                                        </td>
                                        <td width="25%">
                                            <p style="font-weight: bold;">Name: {{$payment['customer']['name']}} </p>
                                        </td>
                                        <td width="25%">
                                            <p style="font-weight: bold;">Mobile No:
                                                {{$payment['customer']['mobile_no']}}</p>
                                        </td>
                                        <td width="35%">
                                            <p style="font-weight: bold;">Address: {{$payment['customer']['address']}}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="15%"></td>
                                        <td width="85%" colspan="3">
                                            <p><strong>Description : </strong>{{ $invoice->description }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('approval.store', $invoice->id ) }}" method="post">
                                @csrf
                                <table border="1" width="100%" style="margin-bottom: 10px;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Sl.</th>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th class="text-center" style="background-color: #ddd; padding: 1px;">
                                                Current Stock</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_sum = '0';
                                        @endphp
                                        @foreach ($invoice['invoice_details'] as $key => $item)
                                        <tr class="text-center">
                                            <input type="hidden" name="category_id[]" value="{{$item->category_id}}">
                                            <input type="hidden" name="product_id[]" value="{{$item->product_id}}">
                                            <input type="hidden" name="selling_qty[{{$item->id}}]" value="{{$item->selling_qty}}">
                                            <input type="hidden" name="">
                                            <td>{{$key + 1}}</td>
                                            <td>{{ $item['category']['name'] }}</td>
                                            <td>{{ $item['product']['name'] }}</td>
                                            <td class="text-center" style="background-color: #ddd; padding: 1px;">
                                                {{ $item['product']['quantity'] }}</td>
                                            <td>{{ $item->selling_qty }}</td>
                                            <td>{{ $item->unit_price }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                        </tr>
                                        @php
                                        $total_sum += $item->selling_price;
                                        @endphp
                                        @endforeach
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Subtotal</strong> </td>
                                            <td class="text-center"> {{ $total_sum }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Discount</strong> </td>
                                            <td class="text-center"> {{ $payment->discount_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Paid Amount</strong> </td>
                                            <td class="text-center"> {{ $payment->paid_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Due Amount</strong> </td>
                                            <td class="text-center"> {{ $payment->due_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Grand Total</strong> </td>
                                            <td class="text-center"> {{ $payment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-success" type="submit">Approve Invoice</button>
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
<script type="text/javascript">
    $(document).ready(function () {

    });

</script>
@endsection
