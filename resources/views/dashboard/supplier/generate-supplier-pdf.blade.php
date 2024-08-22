<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>Ini Supplier</h1>

    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Kota Supplier</th>
                    <th>Email Supplier</th>
                    <th>No HP Supplier</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($supplier as $data)
                    <tr>
                        <td>{{ $data->nama_supplier }}</td>
                        <td>{{ $data->alamat_supplier }}</td>
                        <td>{{ $data->kota_supplier }}</td>
                        <td>{{ $data->email_supplier }}</td>
                        <td>{{ $data->nohp_supplier }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Kota Supplier</th>
                    <th>Email Supplier</th>
                    <th>No HP Supplier</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
