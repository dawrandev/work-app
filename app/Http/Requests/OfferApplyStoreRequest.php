<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferApplyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'offer_id' => 'required|exists:offers,id',
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'offer_id.required' => __('The offer field is required.'),
            'offer_id.exists' => __('The selected offer is invalid.'),

            'job_id.required' => __('The job field is required.'),
            'job_id.exists' => __('The selected job is invalid.'),

            'cover_letter.string' => __('The cover letter must be a string.'),
            'cover_letter.max' => __('The cover letter may not be greater than 500 characters.'),
        ];
    }
}
