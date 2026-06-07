<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pelayanan</title>
    <style>
        @page { margin: 1cm; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; color: #333; line-height: 1.4; }
        
        /* Header Section */
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .header h1 { margin: 0; font-size: 18px; text-transform: uppercase; }
        .header p { margin: 5px 0 0; font-size: 12px; }

        /* Table Styling */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f8f9fa; color: #000; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ccc; }
        td { padding: 8px; border: 1px solid #ccc; vertical-align: top; }
        
        /* Alternating Rows */
        tr:nth-child(even) { background-color: #fcfcfc; }
        
        /* Footer Info */
        .footer { margin-top: 30px; font-size: 10px; color: #777; text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Data Pelayanan</h1>
        <p>Data Per Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Pelayan</th>
                <th>Jenis Pelayanan</th>
                <th>Kegiatan Ibadah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelayanan as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $item->nama_pelayan }}</td>
                <td>
                    <span style="background-color: #eee; padding: 2px 6px; border-radius: 4px;">
                        {{ $item->jenis_pelayanan }}
                    </span>
                </td>
                <td>{{ $item->jadwalIbadah->nama_kegiatan ?? 'Tanpa Jadwal' }}</td>
                <td>
                    {{ $item->jadwalIbadah ? \Carbon\Carbon::parse($item->jadwalIbadah->tanggal)->translatedFormat('d M Y') : '-' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; color: #999;">Tidak ada data pelayanan yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>