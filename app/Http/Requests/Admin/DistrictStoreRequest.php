<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DistrictStoreRequest extends FormRequest
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
            'name' => 'required|array',
            'name.uz' => 'required|string|max:255',
            'name.kaa' => 'required|string|max:255',
            'name.ru' => 'required|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('District name is required'),
            'name.uz.required' => __('Uzbek name is required'),
            'name.kaa.required' => __('Karakalpak name is required'),
            'name.ru.required' => __('Russian name is required'),
        ];
    }
}
