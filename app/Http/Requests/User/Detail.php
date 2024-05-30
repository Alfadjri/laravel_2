<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Detail extends FormRequest
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
            'id_user' => ['required','exists:biodata_users,id'],
        ];
    }

    public function message(): array
    {
        return[
            'id_user.required' => "id_user tidak boleh kosong",
            'id_user.exists' => "id_user tidak boleh kosong",
        ];
    }
}
