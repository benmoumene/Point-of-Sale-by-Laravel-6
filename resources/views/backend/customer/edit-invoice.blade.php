@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Customer Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/')  }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Invoice</li>
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
                            <h3>Edit Customer
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="30%">Customer Name: {{ $payment['customer']['name'] }}</td>
                                        <td width="30%">Mobile: {{ $payment['customer']['mobile_no'] }}</td>
                                        <td width="30%">Address: {{ $payment['customer']['address'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('customers.credit.invoice.update', $payment->invoice_id) }}"
                                method="post">
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
                                        $invoice_details = App\Model\InvoiceDetail::where('invoice_id',
                                        $payment->invoice_id)->get();
                                        @endphp
                                        @foreach ($invoice_details as $key => $item)
                                        <tr class="text-center">
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
                                            <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
                                            <td class="text-center"> {{ $payment->due_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="6"><strong>Grand Total</strong> </td>
                                            <td class="text-center"> {{ $payment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="paid_status">Paid Status</label>
                                        <select name="paid_status" id="paid_status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="full_paid">Full Paid</option>
                                            <option value="partial_paid">Partial Paid</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 paid_amount_div" style="display: none;">
                                        <label for="paid_amount_div" class="paid_amount" style="display: none;">Enter
                                            Amount</label>
                                        <input type="text" name="paid_amount" class="form-control paid_amount"
                                            style="display: none;" placeholder="Enter partial amount">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" class="form-control datepicker"
                                            placeholder="YYYY-MM-DD" required>
                                    </div>
                                    <div class="form-group col-md-3" style="padding-top: 34px;">
                                        <button type="submit" class="btn btn-warning">Update Invoice</button>
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

<script type="text/javascript">
    $(document).on('change', '#paid_status', function () {
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount_div').show();
            $('.paid_amount').show();
        } else {
            $('.paid_amount_div').hide();
            $('.paid_amount').hide();
        }
    });

</script>
@endsection
