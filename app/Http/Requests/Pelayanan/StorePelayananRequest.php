<?php

namespace App\Http\Requests\Pelayanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Pelayanan;

class StorePelayananRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'jadwal_ibadah_id' => ['required', 'exists:jadwal_ibadah,id'],
            'nama_pelayan'     => ['required', 'string', 'max:255'],
            'jenis_pelayanan'  => ['required', Rule::in(Pelayanan::JENIS_PELAYANAN)],
        ];
    }

    public function messages(): array
    {
        return [
            'jadwal_ibadah_id.required' => 'Jadwal ibadah wajib dipilih.',
            'jadwal_ibadah_id.exists'   => 'Jadwal ibadah tidak ditemukan.',
            'nama_pelayan.required'     => 'Nama pelayan wajib diisi.',
            'jenis_pelayanan.required'  => 'Jenis pelayanan wajib dipilih.',
        ];
    }
}