<?php

namespace App\Http\Requests\Keuangan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKeuanganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin', 'bendahara']);
    }

    public function rules(): array
    {
        return [
            'jenis'      => ['required', Rule::in(['pemasukan', 'pengeluaran'])],
            'kategori'   => ['required', 'string', 'max:100'],
            'jumlah'     => ['required', 'numeric', 'min:0'],
            'tanggal'    => ['required', 'date'],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'jenis.required'    => 'Jenis transaksi wajib dipilih.',
            'kategori.required' => 'Kategori wajib diisi.',
            'jumlah.required'   => 'Jumlah wajib diisi.',
            'jumlah.numeric'    => 'Jumlah harus berupa angka.',
            'jumlah.min'        => 'Jumlah tidak boleh negatif.',
            'tanggal.required'  => 'Tanggal wajib diisi.',
        ];
    }
}