<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => 'required|digits:9',
            'password' => 'required|min:8|string'
        ];
    }

    public function normalizeNumber($value)
    {
        return $value ? (int)str_replace(' ', '', $value) : null;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'phone' => $this->normalizeNumber($this->phone)
        ]);
    }

    public function messages(): array
    {
        return [
            'phone.required' => __('The phone number is required.'),
            'phone.digits' => __('The phone number must be exactly 9 digits.'),

            'password.required' => __('The password field is required.'),
            'password.min' => __('The password must be at least 8 characters.'),
            'password.string' => __('The password must be a string.'),
        ];
    }
}
