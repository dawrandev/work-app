<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|digits:9|unique:users,phone,' . $this->user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => __('The first name field is required.'),
            'first_name.string' => __('The first name must be a string.'),
            'last_name.required' => __('The last name field is required.'),
            'last_name.string' => __('The last name must be a string.'),
            'phone.required' => __('The phone number is required.'),
            'phone.digits' => __('The phone number must be exactly 9 digits.'),
            'phone.unique' => __('The phone number has already been taken.'),
            'password.string' => __('The password must be a string.'),
            'password.min' => __('The password must be at least 8 characters.'),
            'password.confirmed' => __('The password confirmation does not match.'),
        ];
    }
}
