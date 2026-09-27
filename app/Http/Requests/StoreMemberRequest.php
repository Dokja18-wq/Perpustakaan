<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|max:20|unique:members,nim',
            'email'         => 'required|email|max:255|unique:members,email',
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|in:aktif,nonaktif',
        ];
    }
}
