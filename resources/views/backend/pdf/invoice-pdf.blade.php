<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice #No{{ $invoice->invoice_no }}</title>
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
        href="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    @php
                    $payment = App\Model\Payment::where('invoice_id', $invoice->id)->first();
                    @endphp
                    <tbody>
                        <tr>
                            <td width="25%">
                                <p style="font-weight: bold;">Name: </p><span>{{$payment['customer']['name']}}</span>
                            </td>
                            <td width="25%">
                                <p style="font-weight: bold;">Mobile No:</p><span>{{$payment['customer']['mobile_no']}}</span>
                            </td>
                            <td width="35%">
                                <p style="font-weight: bold;">Address:</p><span>{{$payment['customer']['address']}}</span>
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
            </div>
        </div>
    </div>
</body>
</html>
