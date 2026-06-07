<?php

namespace App\Http\Requests\JadwalIbadah;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJadwalIbadahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'judul_ibadah' => ['required', 'string', 'max:255'],
            'tanggal'      => ['required', 'date'],
            'waktu'        => ['required', 'date_format:H:i'],
            'lokasi'       => ['required', 'string', 'max:255'],
            'pendeta'      => ['nullable', 'string', 'max:255'],
            'tema'         => ['nullable', 'string', 'max:255'],
        ];
    }
}