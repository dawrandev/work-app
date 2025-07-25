<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobSaveStoreRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'job_id.required' => __('The job field is required.'),
            'job_id.exists' => __('The selected job is invalid.'),
        ];
    }
}
