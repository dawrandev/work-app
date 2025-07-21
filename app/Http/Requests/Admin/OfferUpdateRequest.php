<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
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
            'approval_status' => 'required|string|in:rejected,approved'
        ];
    }

    public function messages(): array
{
    return [
        'approval_status.required' => __('The approval status field is required.'),
        'approval_status.string' => __('The approval status must be a string.'),
        'approval_status.in' => __('The selected approval status is invalid. It must be either "rejected" or "approved".'),
    ];
}

}
