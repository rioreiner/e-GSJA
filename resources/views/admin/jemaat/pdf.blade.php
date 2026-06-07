<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Jemaat</title>

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
        }

        th{
            background:#f3f4f6;
        }
    </style>
</head>
<body>

    <h2>Data Jemaat Gereja</h2>

    <p>
        Tanggal Export :
        {{ now()->format('d M Y H:i') }}
    </p>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($jemaat as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nomor_anggota }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>{{ $item->status_keanggotaan }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>