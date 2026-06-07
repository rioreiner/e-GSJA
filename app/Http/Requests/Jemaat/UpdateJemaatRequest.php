<?php

namespace App\Http\Requests\Jemaat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJemaatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'nama_lengkap'      => ['required', 'string', 'max:255'],
            'jenis_kelamin'     => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggal_lahir'     => ['nullable', 'date', 'before:today'],
            'alamat'            => ['nullable', 'string', 'max:1000'],
            'no_telepon'        => ['nullable', 'string', 'max:20'],
            'email'             => ['nullable', 'email', 'max:255'],
            'status_pernikahan' => ['required', Rule::in(['Belum Menikah', 'Menikah', 'Cerai', 'Janda', 'Duda'])],
            'status_keanggotaan'=> ['required', Rule::in(['Aktif', 'Tidak Aktif', 'Pindah', 'Meninggal'])],
            'foto'              => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_lengkap.required'       => 'Nama lengkap wajib diisi.',
            'jenis_kelamin.required'       => 'Jenis kelamin wajib dipilih.',
            'tanggal_lahir.before'         => 'Tanggal lahir harus sebelum hari ini.',
            'status_pernikahan.required'   => 'Status pernikahan wajib dipilih.',
            'status_keanggotaan.required'  => 'Status keanggotaan wajib dipilih.',
            'foto.image'                   => 'File harus berupa gambar.',
            'foto.max'                     => 'Ukuran foto maksimal 2MB.',
        ];
    }
}