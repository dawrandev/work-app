<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'phone' => 'required|digits:9',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        session()->flash('form', 'register');

        throw new ValidationException($validator, redirect()
            ->back()
            ->withErrors($validator)
            ->withInput());
    }

    public function prepareForValidation()
    {
        $this->merge(
            [
                'phone' => $this->normalizeNumber($this->phone)
            ]
        );
    }

    public function normalizeNumber($value)
    {
        return $value ? (int)str_replace(' ', '', $value) : null;
    }
}
