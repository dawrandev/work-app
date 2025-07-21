<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'icon' => 'required|string|max:255',
            'name.uz' => 'required|string|max:255',
            'name.ru' => 'required|string|max:255',
            'name.kr' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'icon.required' => __('The icon field is required.'),
            'icon.string' => __('The icon must be a string.'),
            'icon.max' => __('The icon may not be greater than 255 characters.'),

            'name.uz.required' => __('The Uzbek name field is required.'),
            'name.uz.string' => __('The Uzbek name must be a string.'),
            'name.uz.max' => __('The Uzbek name may not be greater than 255 characters.'),

            'name.ru.required' => __('The Russian name field is required.'),
            'name.ru.string' => __('The Russian name must be a string.'),
            'name.ru.max' => __('The Russian name may not be greater than 255 characters.'),

            'name.kr.required' => __('The Karakalpak name field is required.'),
            'name.kr.string' => __('The Karakalpak name must be a string.'),
            'name.kr.max' => __('The Karakalpak name may not be greater than 255 characters.'),
        ];
    }
}
