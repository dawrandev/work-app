<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => 'required|array',
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

            'name.required' => __('The name field is required.'),
            'name.array' => __('The name must be an array.'),

            'name.uz.required' => __('The name in Uzbek is required.'),
            'name.uz.string' => __('The name in Uzbek must be a string.'),
            'name.uz.max' => __('The name in Uzbek may not be greater than 255 characters.'),

            'name.ru.required' => __('The name in Russian is required.'),
            'name.ru.string' => __('The name in Russian must be a string.'),
            'name.ru.max' => __('The name in Russian may not be greater than 255 characters.'),

            'name.kr.required' => __('The name in Karakalpak is required.'),
            'name.kr.string' => __('The name in Karakalpak must be a string.'),
            'name.kr.max' => __('The name in Karakalpak may not be greater than 255 characters.'),
        ];
    }
}
