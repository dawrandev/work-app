<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TypeStoreRequest extends FormRequest
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
            'name.required' => __('The name field is required.'),
            'name.array' => __('The name must be an array.'),

            'name.uz.required' => __('The Uzbek name field is required.'),
            'name.uz.string' => __('The Uzbek name must be a string.'),
            'name.uz.max' => __('The Uzbek name may not be greater than 255 characters.'),

            'name.kaa.required' => __('The Karakalpak name field is required.'),
            'name.kaa.string' => __('The Karakalpak name must be a string.'),
            'name.kaa.max' => __('The Karakalpak name may not be greater than 255 characters.'),

            'name.ru.required' => __('The Russian name field is required.'),
            'name.ru.string' => __('The Russian name must be a string.'),
            'name.ru.max' => __('The Russian name may not be greater than 255 characters.'),
        ];
    }
}
