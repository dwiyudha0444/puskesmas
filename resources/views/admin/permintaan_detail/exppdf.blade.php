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
        <h2 style="clear: both;">Laporan Permintaan</h2>

        <div style="float: left;">
            <p>PUSKESMAS: <strong>BAE</strong></p>
            <p>KAB/KODYA: <strong>KUDUS</strong></p>
            <p>KETERANGAN: <strong>KUDUS</strong></p>
        </div>
        
        <div style="float: right;">
            <p>TANGGAL PEMAKAIAN: <strong>DESEMBER</strong></p>
            <p>NO PEMAKAIAN: <strong>12</strong></p>
            <p>PENANGGUNG JAWAB: <strong>{{ Auth::user()->name }}</strong></p>
        </div>

        <h2 style="clear: both;"></h2>

        <table border="1" cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @php $no= 1; @endphp
                @foreach ($permintaan_detail as $per)
                <tr>
                    <td>{{ $no++ }}</td> 

                    @empty($per->permintaan->tgl_permintaan)
                    <td><p>belum diisi</p></td>
                    @else
                    <td>{{ $per->created_at->format('d M Y') }}</td>
                    @endempty

                    @empty($per->obat->nama_obat)
                    <td><p>belum diisi</p></td>
                    @else
                    <td>{{ $per->obat->nama_obat }}</td>
                    @endempty

                    @empty($per->persediaan)
                    <td><p>belum diisi</p></td>
                    @else
                    <td>{{ $per->persediaan }}</td>
                    @endempty
                
                    <td>{{ Auth::user()->name }}</td>
                    
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
