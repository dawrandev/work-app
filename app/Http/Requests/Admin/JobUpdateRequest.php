<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateRequest extends FormRequest
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
            'status' => 'string|required|in:rejected,approved'
        ];
    }

    public function messages(): array
{
    return [
        'status.required' => __('The status field is required.'),
        'status.string' => __('The status must be a string.'),
        'status.in' => __('The selected status is invalid. It must be either "rejected" or "approved".'),
    ];
}

}
