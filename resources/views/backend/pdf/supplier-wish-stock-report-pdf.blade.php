<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Wish Stock Report</title>
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
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <p style="position: center; align: center;">Supplier Name: {{ $allData['0']['supplier']['name'] }}</p>
                <table border="1" width="100%" style="margin-bottom: 10px;">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product['category']['name'] }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity}}</td>
                            <td>{{ $product['unit']['name'] }}</td>
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
