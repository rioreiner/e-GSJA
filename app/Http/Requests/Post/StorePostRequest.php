<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'judul'  => ['required', 'string', 'max:255'],
            'isi'    => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:4096'],
            'author' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required'  => 'Judul berita wajib diisi.',
            'isi.required'    => 'Isi berita wajib diisi.',
            'author.required' => 'Nama penulis wajib diisi.',
            'gambar.image'    => 'File harus berupa gambar.',
            'gambar.max'      => 'Ukuran gambar maksimal 4MB.',
        ];
    }
}