<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF Details</title>
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Invoice No: #{{ $payment['invoice']['invoice_no'] }}</strong></td>
                            <td><span style="font-size: 20px; background: #1781BF; padding: 3px 10px; color: #fff">Name
                                    of Shapping Mall</span><br>Dhaka</td>
                            <td>
                                <span>Showroom No: 01710000000 <br> Owner No: 01844547744</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Customer Name: {{ $payment['customer']['name'] }}</td>
                            <td width="30%">Mobile: {{ $payment['customer']['mobile_no'] }}</td>
                            <td width="30%">Address: {{ $payment['customer']['address'] }}</td>
                        </tr>
                    </tbody>
                </table><br><br>
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
                        <tr>
                            <td colspan="7" style="text-align: center; font-weight: bold;">Paid Summary</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: right;"><strong>Date</strong></td>
                            <td colspan="3"><strong>Amount</strong></td>
                        </tr>
                        @php
                            $payment_details = App\Model\PaymentDetail::where('invoice_id', $payment->invoice_id)->get();
                        @endphp
                        @foreach ($payment_details as $detail)
                        <tr>
                            <td colspan="4" style="text-align: right;">{{ $detail->date }}</td>
                            <td colspan="3">{{ $detail->current_paid_amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
