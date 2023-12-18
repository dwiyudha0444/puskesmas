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
            border: none;
            /* Menambahkan properti border: none; */
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
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
            border: none;
            /* Menambahkan properti border: none; */
        }

        .custom-table th,
        .custom-table td {
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
            <p>PUSKESMAS: <strong>BAE</strong></p>
            <p>KAB/KODYA: <strong>KUDUS</strong></p>
            <p>KETERANGAN: <strong>KUDUS</strong></p>
        </div>

        <div style="float: right;">
            <p>TANGGAL PEMAKAIAN: <strong>12</strong></p>
            <p>NO PEMAKAIAN: <strong>12</strong></p>
            <p>PENANGGUNG JAWAB: <strong>12</strong></p>
        </div>

        <h2 style="clear: both;"></h2>

        <table border="1" cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Kode Obat</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Expired</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($persediaan as $per)
                    <tr>
                        <th>{{ $no++ }}</a></th>
        
                        <td>
                            @if(empty($per->obat->nama_obat))
                                <p>belum diisi</p>
                            @else
                                {{ $per->obat->nama_obat }}
                            @endif
                        </td>
        
                        <td>
                            @if(empty($per->obat->kode_obat))
                                <p>belum diisi</p>
                            @else
                                {{ $per->obat->kode_obat }}
                            @endif
                        </td>
        
                        <td>
                            @if(empty($per->jumlah_masuk))
                                <p>belum diisi</p>
                            @else
                                {{ $per->jumlah_masuk }}
                            @endif
                        </td>

                        <td>
                            @if(empty($per->obat->satuan))
                                <p>belum diisi</p>
                            @else
                                {{ $per->obat->satuan }}
                            @endif
                        </td>
        
                        <td>
                            @if(empty($per->expired))
                                <p>belum diisi</p>
                            @else
                                {{ $per->expired }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="custom-table" cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>Issued By</th>
                    <th>Verified By</th>
                    <th>Apporved By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>(___________________)</td>
                    <td>(___________________)</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
