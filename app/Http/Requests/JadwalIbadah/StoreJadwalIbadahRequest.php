<?php

namespace App\Http\Requests\JadwalIbadah;

use Illuminate\Foundation\Http\FormRequest;

class StoreJadwalIbadahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'tanggal'      => ['required', 'date'],
            'waktu'        => ['required', 'date_format:H:i'],
            'lokasi'       => ['required', 'string', 'max:255'],
            'pendeta'      => ['nullable', 'string', 'max:255'],
            'tema'         => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'tanggal.required'      => 'Tanggal wajib diisi.',
            'waktu.required'        => 'Waktu wajib diisi.',
            'lokasi.required'       => 'Lokasi wajib diisi.',
        ];
    }
}