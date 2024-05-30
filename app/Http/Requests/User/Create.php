<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'email' => ['required','email','unique:users,email'],
                'password' => ['required','string','min:8'],
                'nama_lengkap' => ['required','string'],
                'no_handphone' => ['required','string'],
                'alamat' => ['nullable'],
        ];
    }
    public function message(): array
    {
        return [
            'email.required' => "email tidak boleh kosong",
            'email.unique' => "email tidak boleh kosong",
            'password.min' => "password panjangnya tidak boleh kurang dari 8 huruf",
            'password.required' => "password tidak boleh kosong",
        ];
    }
}
