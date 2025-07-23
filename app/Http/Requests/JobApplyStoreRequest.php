<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplyStoreRequest extends FormRequest
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
            'job_id' => 'required|exists:jobs,id',
            'offer_id' => 'required|exists:offers,id',
            'cover_letter' => 'nullable|string|max:500'
        ];
    }

    public function messages(): array
    {
        return [
            'job_id.required' => __('The job field is required.'),
            'job_id.exists' => __('The selected job is invalid.'),

            'offer_id.required' => __('The offer field is required.'),
            'offer_id.exists' => __('The selected offer is invalid.'),

            'cover_letter.required' => __('The cover letter field is required.'),
            'cover_letter.string' => __('The cover letter must be a string.'),
            'cover_letter.max' => __('The cover letter may not be greater than 1000 characters.'),
        ];
    }
}
