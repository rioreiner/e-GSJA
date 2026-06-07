<?php

namespace App\Exports;

use App\Models\Pelayanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PelayananExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * Mengambil data dengan relasi jadwalIbadah
    */
    public function collection()
    {
        return Pelayanan::with('jadwalIbadah')->get();
    }

    /**
    * Header PDF
    */
    public function headings(): array
    {
        return [
            'Nama Pelayan',
            'Jenis Pelayanan',
            'Kegiatan Ibadah',
            'Tanggal Ibadah'
        ];
    }

    /**
    * Mapping data ke PDF
    */
    public function map($pelayanan): array
    {
        return [
            $pelayanan->nama_pelayan,
            $pelayanan->jenis_pelayanan,
            $pelayanan->jadwalIbadah->nama_kegiatan ?? 'N/A', // Mengambil data dari relasi
            $pelayanan->jadwalIbadah 
                ? \Carbon\Carbon::parse($pelayanan->jadwalIbadah->tanggal)->translatedFormat('d F Y') 
                : 'N/A'
        ];
    }

    /**
    * Styling Tabel PDF
    */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}