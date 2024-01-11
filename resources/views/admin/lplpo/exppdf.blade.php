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
        <h2 style="clear: both;">Laporan Pemakaian dan Lembar Permintaan Obat</h2>

        <div style="float: left;">
            <p>PUSKESMAS: <strong>BAE</strong></p>
            <p>KAB/KODYA: <strong>KUDUS</strong></p>
        </div>
        
        <div style="float: right;">
            <p>PELAPORAN BULAN/PERIODE: <strong>{{ $latestObat->created_at->format('F') }}</strong></p>
            <p>PERMINTAAN BULAN/PERIODE: <strong>{{ $latestObat->created_at->format('F') }}</strong></p>
        </div>

        <h2 style="clear: both;"></h2>

        <table border="1" cellpadding="10" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Stok Awal</th>
                    <th>Penerimaan</th>
                    <th>Persediaan</th>
                    <th>Pemakaian</th>
                    <th>Sisa Stok</th>
                    <th>Permintaan</th>
                </tr>
            </thead>
            <tbody>
                @php $no= 1; @endphp
                @foreach ($obat as $per)
                <tr>
                    <td>{{ $no++ }}</td> 

                    @empty($per->nama_obat)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->nama_obat }}</td>
                    @endempty

                    @empty($per->satuan)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->satuan }}</td>
                    @endempty

                    @empty($per->stok_awal)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->stok_awal }}</td>
                    @endempty

                    @empty($per->penerimaan)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->penerimaan }}</td>
                    @endempty

                    @empty($per->persediaan)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->persediaan }}</td>
                    @endempty
                    
                    @empty($per->pemakaian)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->pemakaian }}</td>
                    @endempty
                    
                    @empty($per->sisa_stok)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->sisa_stok }}</td>
                    @endempty

                    @empty($per->penerimaan)
                    <td><p>0</p></td>
                    @else
                    <td>{{ $per->penerimaan }}</td>
                    @endempty
                    
                    
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
