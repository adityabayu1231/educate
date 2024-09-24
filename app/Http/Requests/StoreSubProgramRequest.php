<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubProgramRequest extends FormRequest
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
            'program_id' => ['required', 'exists:programs,id'], // program_id harus ada dan sesuai dengan ID di tabel programs
            'brand_id' => ['required', 'exists:brands,id'], // brand_id harus ada dan sesuai dengan ID di tabel brands
            'name_sub_program' => ['required', 'string', 'max:255'], // nama subprogram wajib diisi dan maksimal 255 karakter
        ];
    }
}
