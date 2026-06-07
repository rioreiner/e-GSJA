<?php

namespace App\Exports;

use App\Models\Jemaat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JemaatExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Jemaat::select(
            'nomor_anggota',
            'nama_lengkap',
            'jenis_kelamin',
            'no_telepon',
            'email',
            'status_keanggotaan'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nomor Anggota',
            'Nama Lengkap',
            'Jenis Kelamin',
            'No Telepon',
            'Email',
            'Status Keanggotaan',
        ];
    }
}