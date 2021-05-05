<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet"
        href="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')  }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%" style="margin-bottom: 10px;">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Customer Name</th>
                            <th>Invoice No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment['customer']['name'] }} ({{ $payment['customer']['mobile_no'] }})</td>
                                <td>Invoice No #{{ $payment['invoice']['invoice_no'] }}</td>
                                <td>{{ date("d-m-Y", strtotime($payment['invoice']['date'])) }}</td>
                                <td>{{ $payment->due_amount  }}৳</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
