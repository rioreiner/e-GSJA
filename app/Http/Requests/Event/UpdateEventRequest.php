<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole(['admin']);
    }

    public function rules(): array
    {
        return [
            'nama_event' => ['required', 'string', 'max:255'],
            'tanggal'    => ['required', 'date'],
            'lokasi'     => ['required', 'string', 'max:255'],
            'deskripsi'  => ['nullable', 'string'],
            'banner'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
        ];
    }
}