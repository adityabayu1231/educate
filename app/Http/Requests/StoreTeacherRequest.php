<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'religion' => 'required|string|max:50',
            'province_id' => 'required|integer|exists:provinces,id',
            'city_id' => 'required|integer|exists:cities,id',
            'district_id' => 'required|integer|exists:districts,id',
            'village_id' => 'required|integer|exists:villages,id',
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:500',
            'university' => 'required|string|max:255',
            'degree' => 'required|string|max:100',
            'major' => 'required|string|max:100',
            'teaching_level' => 'required|string|max:100',
            'achievements' => 'nullable|string|max:1000',
            'notes' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|max:10240',
            'nik' => 'required|string|max:20|unique:teachers,nik',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'subject_id' => 'required|exists:subjects,id',
            'bank' => 'required|string|max:100',
            'account_number' => 'required|string|max:20',
            'account_name' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'User is required.',
            'user_id.exists' => 'Selected user does not exist.',
            'place_of_birth.required' => 'Place of birth is required.',
            'date_of_birth.required' => 'Date of birth is required.',
            'gender.required' => 'Gender is required.',
            'gender.in' => 'Gender must be male or female.',
            'religion.required' => 'Religion is required.',
            'province_id.required' => 'Province is required.',
            'city_id.required' => 'City is required.',
            'district_id.required' => 'District is required.',
            'village_id.required' => 'Village is required.',
            'postal_code.required' => 'Postal code is required.',
            'address.required' => 'Address is required.',
            'university.required' => 'University is required.',
            'degree.required' => 'Degree is required.',
            'major.required' => 'Major is required.',
            'nik.unique' => 'This national ID is already used.',
            'cv.mimes' => 'CV must be a file of type: pdf, doc, docx.',
            'cv.max' => 'CV may not be greater than 5MB.',
            'photo.max' => 'Photo may not be greater than 2MB.',
        ];
    }
}
