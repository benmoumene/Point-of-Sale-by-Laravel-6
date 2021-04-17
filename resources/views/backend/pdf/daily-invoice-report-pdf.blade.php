<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Invoice Report ({{ date('d-m-Y', strtotime($start_date)) }} -
        {{ date('d-m-Y', strtotime($end_date)) }})</title>
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
                            <td style="text-align: center;">Shop Name</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <table>
                    <tbody>
                        <tr>
                            <td width="30%"></td>
                            <td>
                                <u>
                                    <strong>
                                        <span style="font-style: 15px;">
                                            Daily Invoice Report({{ date('d-m-Y', strtotime($start_date)) }} -
                                            {{ date('d-m-Y', strtotime($end_date)) }})
                                        </span>
                                    </strong>
                                </u>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th style="width: 12%">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key => $invoice)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $invoice['payment']['customer']['name'] }}
                                ({{ $invoice['payment']['customer']['mobile_no'] }})
                            </td>
                            <td>Invoice No #{{ $invoice->invoice_no }}</td>
                            <td>{{ date('d-m-y', strtotime($invoice->date)) }}</td>
                            <td>{{ $invoice->description }}</td>
                            <td>
                                {{ $invoice['payment']['paid_amount'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <br><hr>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="80%"></td>
                        <td width="20%">Owner Sign</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
