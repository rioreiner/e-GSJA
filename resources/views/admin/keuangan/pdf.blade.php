<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan Gereja</title>

    <style>
        body{
            font-family: sans-serif;
            font-size: 12px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #ccc;
            padding:8px;
            text-align:left;
        }

        th{
            background:#f3f4f6;
        }

        .title{
            text-align:center;
            margin-bottom:20px;
        }

        .summary{
            margin-top:20px;
        }
    </style>
</head>
<body>

    <div class="title">
        <h2>Laporan Keuangan Gereja</h2>
        <p>{{ now()->format('d F Y') }}</p>
    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Jumlah</th>
            </tr>
        </thead>

        <tbody>

            @foreach($keuangan as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    {{ $item->created_at->format('d/m/Y') }}
                </td>

                <td>
                    {{ $item->keterangan }}
                </td>

                <td>
                    {{ $item->jenis }}
                </td>

                <td>
                    Rp {{ number_format($item->jumlah,0,',','.') }}
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="summary">

        <h4>
            Total Pemasukan :
            Rp {{ number_format($totalPemasukan,0,',','.') }}
        </h4>

        <h4>
            Total Pengeluaran :
            Rp {{ number_format($totalPengeluaran,0,',','.') }}
        </h4>

        <h4>
            Saldo :
            Rp {{ number_format($totalPemasukan - $totalPengeluaran,0,',','.') }}
        </h4>

    </div>

</body>
</html>