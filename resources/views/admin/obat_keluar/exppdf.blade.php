<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: none; /* Menambahkan properti border: none; */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .signatures {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: none; /* Menambahkan properti border: none; */
        }

        .custom-table th, .custom-table td {
            border: none;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div>
        <h2 style="clear: both;">Laporan Pemakaian Obat</h2>

        <div style="float: left;">
            <p>Nomor Laporan: <strong>12</strong></p>
        </div>
        <div style="float: right;">
            <p>Tanggal: <strong>12</strong></p>
        </div>

        <h2 style="clear: both;"></h2>

        <table border="1" cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @php $no= 1; @endphp
                @foreach ($pemakaian as $obke)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $obke->tgl_keluar }}</td>
                    <td>{{ $obke->keterangan_keluar }}</td>
                    @empty($obke->user->name)
                        <td><p>belum diisi</p></td>
                    @else
                        <td> {{ $obke->user->name }} </td>
                    @endempty
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="custom-table"  cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>Nama 1</th>
                    <th>Nama 2</th>
                    <th>Nama 3</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12</td>
                    <td>13</td>
                    <td>11</td>
                </tr>
            </tbody>
        </table>
    </div>


    
</body>
</html>
